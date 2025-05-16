<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->when(Auth::user()->type === 'patient', function ($query) {
                return $query->where('patient_id', Auth::id());
            })
            ->when(Auth::user()->type === 'doctor', function ($query) {
                return $query->where('doctor_id', Auth::id());
            })
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->get();

        $doctors = User::where('type', 'doctor')
            ->select('id', 'name', 'specialty', 'profile_image')
            ->get();

        $patients = User::where('type', 'patient')
            ->when(Auth::user()->type === 'patient', function ($query) {
                return $query->where('id', Auth::id());
            })
            ->select('id', 'name', 'email', 'mobile', 'dob')
            ->get();

        return view('dashboard.appointment.appointment', compact('appointments', 'doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patientType' => "required",
            "patientName" => "string|nullable",
            "patientEmail" => "email|nullable|unique:users,email",
            "mobile" => "string|nullable",
            "dob" => "date|nullable",
            'patient_id' => 'exists:users,id|nullable',
            'doctor_id' => 'exists:users,id',
            'dateAppoint' => 'required|date|after_or_equal:today',
            'timeSlot' => 'required',
            'appointmentReason' => 'required|string',
            'appointmentNotes' => 'nullable|string',
            'department' => 'string|nullable',
        ]);
        
        // return $request->all();
        
        if ($request->patientType == 'newPatient') {
            $user = User::where('email', $request->patientEmail)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $request->patientName,
                    'email' => $request->patientEmail,
                    'dob' => $request->dob,
                    'mobile' => $request->mobile,
                    'password' => Hash::make('12345678'),
                    'type' => 'patient',
                ]);
            }
        }

        $patient_id = Auth::user()->type === 'patient' ? Auth::id() : ($request->patientType == 'newPatient' ? $user->id : $request->patient_id);

        $appointment = Appointment::create([
            'patient_id' => $patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->dateAppoint,
            'appointment_time' => $request->timeSlot,
            'reason' => $request->appointmentReason,
            'notes' => $request->appointmentNotes,
            'department' => $request->department ?? 'others',
        ]);

        // Create a transaction record for the appointment
        Transaction::create([
            'appointment_id' => $appointment->id,
            'patient_id' => $patient_id,
            'amount' => 100.00, // You may want to make this configurable based on department/doctor
            'payment_method' => 'pending',
            'status' => 'pending',
            'transaction_id' => 'TXN-' . str_pad($appointment->id, 6, '0', STR_PAD_LEFT)
        ]);

        return redirect()->route('dashboard.appointment')
            ->with('success', 'Appointment booked successfully!');
    }

    public function update(Request $request)
    {
        $id = $request->appointment_id;
        $appointment = Appointment::findOrFail($id);
        
        $validated = $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'reason' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $appointment->update($validated);

        return redirect()->route('dashboard.appointment')
            ->with('success', 'Appointment updated successfully!');
    }

    public function cancel(Request $request)
    {
        $id = $request->appointment_id;
        $appointment = Appointment::findOrFail($id);
        
        $appointment->update(['status' => 'cancelled']);

        return redirect()->route('dashboard.appointment')
            ->with('success', 'Appointment cancelled successfully!');
    }

    public function checkAvailability(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $bookedSlots = Appointment::where('doctor_id', $validated['doctor_id'])
            ->where('appointment_date', $validated['date'])
            ->pluck('appointment_time')
            ->toArray();

        // Generate all available time slots
        $timeSlots = $this->generateTimeSlots();
        
        // Mark booked slots as unavailable
        foreach ($timeSlots as &$slot) {
            $slot['available'] = !in_array($slot['time'], $bookedSlots);
        }

        return response()->json([
            'success' => true,
            'timeSlots' => $timeSlots
        ]);
    }

    private function generateTimeSlots()
    {
        $slots = [];
        $start = strtotime('09:00');
        $end = strtotime('17:30');
        $interval = 30 * 60; // 30 minutes

        for ($time = $start; $time <= $end; $time += $interval) {
            $slots[] = [
                'time' => date('H:i', $time),
                'formatted' => date('h:i A', $time),
                'available' => true
            ];
        }

        return $slots;
    }
}
