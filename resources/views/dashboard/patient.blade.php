@extends('layout.dashboard.main')
@section('title', 'Patient Dashboard')
@section('content')
  <main class="main-content" id="mainContent">
    <div class="container-fluid py-4">
      <!-- Statistics Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-primary text-white">
                <i class="bi bi-calendar-check"></i>
              </div>
              <h6 class="stat-card-title">Upcoming Appointment</h6>
            </div>
            <div class="stat-card-value">May 20</div>
            <div class="stat-card-trend">
              <i class="bi bi-clock"></i>
              <span>With Dr. Smith at 10:00 AM</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-success text-white">
                <i class="bi bi-capsule"></i>
              </div>
              <h6 class="stat-card-title">Medications</h6>
            </div>
            <div class="stat-card-value">3</div>
            <div class="stat-card-trend">
              <i class="bi bi-bell"></i>
              <span>Next dose in 2 hours</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-warning text-white">
                <i class="bi bi-file-text"></i>
              </div>
              <h6 class="stat-card-title">Test Results</h6>
            </div>
            <div class="stat-card-value">2</div>
            <div class="stat-card-trend">
              <i class="bi bi-envelope"></i>
              <span>New results available</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-info text-white">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <h6 class="stat-card-title">Health Score</h6>
            </div>
            <div class="stat-card-value">85%</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-graph-up-arrow trend-icon"></i>
              <span>5% better than last month</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Appointments and Medications -->
      <div class="row g-4 mb-4">
        <div class="col-lg-8">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">My Appointments</h5>
              <a href="#" class="btn btn-primary btn-sm">Book New Appointment</a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Dr. Smith</td>
                    <td>May 20, 2025</td>
                    <td>10:00 AM</td>
                    <td>General Checkup</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                  </tr>
                  <!-- More appointments... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="dashboard-card">
            <h5 class="mb-4">Medication Schedule</h5>
            <div class="medication-list">
              <div class="medication-item">
                <div class="medication-icon">
                  <i class="bi bi-clock"></i>
                </div>
                <div class="medication-details">
                  <h6>Amoxicillin</h6>
                  <p>500mg - 3 times daily</p>
                  <small class="text-muted">Next dose: 2:00 PM</small>
                </div>
              </div>
              <!-- More medications... -->
            </div>
          </div>
        </div>
      </div>

      <!-- Health Records -->
      <div class="row">
        <div class="col-12">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Recent Health Records</h5>
              <a href="#" class="text-decoration-none text-primary">View all</a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Doctor</th>
                    <th>Diagnosis</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>May 15, 2025</td>
                    <td>Blood Test</td>
                    <td>Dr. Johnson</td>
                    <td>Normal</td>
                    <td><a href="#" class="btn btn-sm btn-primary">View Report</a></td>
                  </tr>
                  <!-- More records... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection