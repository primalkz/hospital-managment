<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->type === 'doctor') {
            $reports = Report::where('doctor_id', $user->id)->with(['appointment', 'patient'])->latest()->get();
        } elseif ($user->type === 'patient') {
            $reports = Report::where('patient_id', $user->id)->with(['appointment', 'doctor'])->latest()->get();
        } else {
            $reports = Report::with(['appointment', 'doctor', 'patient'])->latest()->get();
        }
        return view('dashboard.reports.index', compact('reports'));
    }

    public function create($appointmentId)
    {
        $appointment = Appointment::with(['doctor', 'patient'])->findOrFail($appointmentId);
        return view('dashboard.reports.create', compact('appointment'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'diagnosis' => 'required|string',
            'details' => 'nullable|string',
            'result' => 'required|in:positive,negative',
            'medicines' => 'nullable|string',
            'report_time' => 'required|date',
            'next_visit_date' => 'nullable|date',
        ]);
        $appointment = Appointment::findOrFail($validated['appointment_id']);
        $report = Report::create([
            'appointment_id' => $appointment->id,
            'doctor_id' => $appointment->doctor_id,
            'patient_id' => $appointment->patient_id,
            'diagnosis' => $validated['diagnosis'],
            'details' => $validated['details'] ?? null,
            'result' => $validated['result'],
            'medicines' => $validated['medicines'] ?? null,
            'report_time' => $validated['report_time'],
            'next_visit_date' => $validated['next_visit_date'] ?? null,
        ]);
        // Optionally update appointment status to completed if not already
        $appointment->update(['status' => 'completed']);
        return redirect()->route('reports.index')->with('success', 'Report generated successfully.');
    }

    public function downloadPdf($id)
    {
        $report = Report::with(['appointment', 'doctor', 'patient'])->findOrFail($id);
        $pdf = Pdf::loadView('dashboard.reports.pdf', compact('report'));
        return $pdf->download('report_'.$report->id.'.pdf');
    }
}
