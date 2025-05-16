@extends('layout.dashboard.main')
@section('title', 'Doctor Dashboard')
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
              <h6 class="stat-card-title">Today's Appointments</h6>
            </div>
            <div class="stat-card-value">12</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-clock me-1"></i>
              <span>Next appointment in 30 mins</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-success text-white">
                <i class="bi bi-people"></i>
              </div>
              <h6 class="stat-card-title">Total Patients</h6>
            </div>
            <div class="stat-card-value">145</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-graph-up-arrow trend-icon"></i>
              <span>5 new this week</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-warning text-white">
                <i class="bi bi-clipboard2-pulse"></i>
              </div>
              <h6 class="stat-card-title">Pending Reports</h6>
            </div>
            <div class="stat-card-value">8</div>
            <div class="stat-card-trend trend-down">
              <i class="bi bi-exclamation-circle me-1"></i>
              <span>Requires attention</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-info text-white">
                <i class="bi bi-star"></i>
              </div>
              <h6 class="stat-card-title">Rating</h6>
            </div>
            <div class="stat-card-value">4.8</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-graph-up-arrow trend-icon"></i>
              <span>Based on 120 reviews</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Today's Schedule -->
      <div class="row mb-4">
        <div class="col-lg-8">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Today's Schedule</h5>
              <a href="#" class="text-decoration-none text-primary">View all</a>
            </div>
            <div class="appointment-list">
              <!-- Repeat for each appointment -->
              <div class="appointment-item border p-2 rounded-2 bg-light">
                <div class="appointment-time">
                  <div class="time-label">09:00 AM</div>
                  <div class="time-value">30 min</div>
                </div>
                <div class="appointment-details ms-2 pt-3">
                  <h6 class="doctor-name">John Smith</h6>
                  <p class="doctor-specialty">General Checkup</p>
                </div>
                <div class="appointment-status pending">
                  Upcoming
                </div>
              </div>
              <!-- More appointments... -->
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="dashboard-card">
            <h5 class="mb-4">Patient Statistics</h5>
            <canvas id="patientStats" height="250"></canvas>
          </div>
        </div>
      </div>

      <!-- Recent Patient Reports -->
      <div class="row">
        <div class="col-12">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Recent Patient Reports</h5>
              <a href="#" class="text-decoration-none text-primary">View all</a>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Diagnosis</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sarah Johnson</td>
                    <td>May 15, 2025</td>
                    <td>Hypertension</td>
                    <td><span class="badge bg-warning">Pending Review</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                  </tr>
                  {{--  --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection