@extends('layout.dashboard.main')

@section('title', 'Create Report')

@section('content')
<main class="main-content" id="mainContent">
  <div class="container py-4">
    <div class="card border-0 shadow-sm rounded-lg">
      <div class="card-body">
        <h4 class="mb-4">Generate Report for Appointment #{{ $appointment->id }}</h4>
        <form method="POST" action="{{ route('reports.store') }}">
          @csrf
          <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
          <div class="mb-3">
            <label class="form-label">Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Details</label>
            <textarea name="details" class="form-control" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Result</label>
            <select name="result" class="form-select" required>
              <option value="positive">Positive</option>
              <option value="negative">Negative</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Medicines Suggested</label>
            <input type="text" name="medicines" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Report Time</label>
            <input type="datetime-local" name="report_time" class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Next Visit Date</label>
            <input type="date" name="next_visit_date" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Generate Report</button>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection 