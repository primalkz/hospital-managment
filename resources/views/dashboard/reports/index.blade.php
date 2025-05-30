@extends('layout.dashboard.main')

@section('title', 'Reports')

@section('content')
<main class="main-content" id="mainContent">
  <div class="container-fluid py-4">
    <div class="card border-0 shadow-sm rounded-lg">
      <div class="card-body">
        <h4 class="mb-4 text-dark">Patient Reports</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Report ID</th>
                <th>Appointment #</th>
                <th>Doctor</th>
                <th>Patient</th>
                <th>Date</th>
                <th>Diagnosis</th>
                <th>Result</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reports as $report)
              <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->appointment_id }}</td>
                <td>{{ $report->doctor->name ?? '-' }}</td>
                <td>{{ $report->patient->name ?? '-' }}</td>
                <td>{{ $report->report_time ? \Carbon\Carbon::parse($report->report_time)->format('M d, Y H:i') : '-' }}</td>
                <td>{{ $report->diagnosis }}</td>
                <td>
                  <span class="badge bg-{{ $report->result === 'positive' ? 'success' : 'danger' }}">
                    {{ ucfirst($report->result) }}
                  </span>
                </td>
                <td>
                  <a href="{{ route('reports.download', $report->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-download"></i> PDF
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection 