<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Patient Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 20px; }
        .label { font-weight: bold; }
        .footer { position: absolute; bottom: 30px; right: 30px; text-align: right; }
        .box { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Medical Hospital - Patient Report</h2>
        <p>Report ID: {{ $report->id }} | Appointment #: {{ $report->appointment_id }}</p>
    </div>
    <div class="section box">
        <span class="label">Doctor:</span> Dr. {{ $report->doctor->name ?? '-' }}<br>
        <span class="label">Patient:</span> {{ $report->patient->name ?? '-' }}<br>
        <span class="label">Date:</span> {{ $report->report_time ? \Carbon\Carbon::parse($report->report_time)->format('M d, Y H:i') : '-' }}<br>
        <span class="label">Reason:</span> {{ $report->appointment->reason ?? '-' }}<br>
    </div>
    <div class="section box">
        <span class="label">Diagnosis:</span> {{ $report->diagnosis }}<br>
        <span class="label">Result:</span> <span style="color:{{ $report->result === 'positive' ? 'green' : 'red' }}">{{ ucfirst($report->result) }}</span><br>
        <span class="label">Details:</span> {{ $report->details ?? '-' }}<br>
        <span class="label">Medicines:</span> {{ $report->medicines ?? 'Paracetamol, Ibuprofen' }}<br>
        <span class="label">Next Visit:</span> {{ $report->next_visit_date ? \Carbon\Carbon::parse($report->next_visit_date)->format('M d, Y') : '-' }}<br>
    </div>
    <div class="footer">
        <p>Doctor's Signature:<br><br>_________________________<br>Dr. {{ $report->doctor->name ?? '-' }}</p>
    </div>
</body>
</html> 