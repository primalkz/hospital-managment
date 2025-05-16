<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
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
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        $doctors = User::where('type', 'doctor')->get();
        return view('dashboard.appointment', compact('appointments', 'doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patientType' => "required",
            "patientName" => "string",
            "patientEmail" => "string",
            // "mobile" => "string",
            // "dob" => "date",
            'patient_id' => 'exists:users,id',
            'doctor_id' => 'exists:users,id',
            'dateAppoint' => 'required|date|after_or_equal:today',
            'timeSlot' => 'required',
            'appointmentReason' => 'required|string',
            'appointmentNotes' => 'nullable|string',
            'department' => 'required|string',
        ]);
        
        return $request->all();
        
        if($request->patientType == 'newPatient' ) {
            User::create([
                'name' => $request->patientName,
                'email' => $request->patientEmail,
                'password' => Hash::make('12345678'),
                'type' => 'patient',
            ]);
        }

        $appointment = Appointment::create([
            '' => 'Doctor User',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('12345678'),
            'type' => 'doctor',
        ]);

        return redirect()->route('dashboard.appointment')
            ->with('success', 'Appointment booked successfully!');
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Appointment status updated successfully!',
            'appointment' => $appointment
        ]);
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
