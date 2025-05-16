@extends('layout.dashboard.main')
@section('title', 'Dashboard')
@section('content')
  <!-- Main Content -->
  <main class="main-content" id="mainContent">
    <div class="container-fluid py-4">
      <!-- Statistics Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-primary text-white">
                <i class="bi bi-person-fill"></i>
              </div>
              <h6 class="stat-card-title">Total Doctors</h6>
            </div>
            <div class="stat-card-value">40</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-graph-up-arrow trend-icon"></i>
              <span>3 Doctors joined this week</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-success text-white">
                <i class="bi bi-people-fill"></i>
              </div>
              <h6 class="stat-card-title">Total Patient</h6>
            </div>
            <div class="stat-card-value">14685</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-graph-up-arrow trend-icon"></i>
              <span>1.3% Up from past week</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-warning text-white">
                <i class="bi bi-cash"></i>
              </div>
              <h6 class="stat-card-title">Total Transaction</h6>
            </div>
            <div class="stat-card-value">$89,0000</div>
            <div class="stat-card-trend trend-down">
              <i class="bi bi-graph-down-arrow trend-icon"></i>
              <span>4.3% Down from yesterday</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="dashboard-card stat-card">
            <div class="stat-card-header">
              <div class="stat-card-icon bg-danger text-white">
                <i class="bi bi-calendar-check"></i>
              </div>
              <h6 class="stat-card-title">Total Appointment</h6>
            </div>
            <div class="stat-card-value">1460</div>
            <div class="stat-card-trend trend-up">
              <i class="bi bi-graph-up-arrow trend-icon"></i>
              <span>1.8% Up from yesterday</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Row -->
      <div class="row g-4 mb-4">
        <!-- Appointment Section -->
        <div class="col-lg-8">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Appointment</h5>
              <a href="#" class="text-decoration-none text-primary">View all</a>
            </div>
            <div class="appointment-list">
              <div class="appointment-item">
                <img src="https://placehold.co/100x100?text=Dr.M" alt="Doctor" class="doctor-avatar">
                <div class="appointment-details">
                  <h6 class="doctor-name">Dr Mamun</h6>
                  <p class="doctor-specialty">Psychiatrist</p>
                </div>
                <div class="appointment-time">
                  <div class="time-label">Today</div>
                  <div class="time-value">09:40</div>
                </div>
              </div>
              <div class="appointment-item">
                <img src="https://placehold.co/100x100?text=Dr.R" alt="Doctor" class="doctor-avatar">
                <div class="appointment-details">
                  <h6 class="doctor-name">Dr Rebecca</h6>
                  <p class="doctor-specialty">Internist</p>
                </div>
                <div class="appointment-time">
                  <div class="time-label">Today</div>
                  <div class="time-value">10:00</div>
                </div>
              </div>
              <div class="appointment-item">
                <img src="https://placehold.co/100x100?text=Dr.E" alt="Doctor" class="doctor-avatar">
                <div class="appointment-details">
                  <h6 class="doctor-name">Dr Emon</h6>
                  <p class="doctor-specialty">Ophthalmologist</p>
                </div>
                <div class="appointment-time">
                  <div class="time-label">Today</div>
                  <div class="time-value">10:30</div>
                </div>
              </div>
              <div class="appointment-item">
                <img src="https://placehold.co/100x100?text=Dr.N" alt="Doctor" class="doctor-avatar">
                <div class="appointment-details">
                  <h6 class="doctor-name">Dr Nadia</h6>
                  <p class="doctor-specialty">Ophthalmologist</p>
                </div>
                <div class="appointment-time">
                  <div class="time-label">Today</div>
                  <div class="time-value">10:30</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Room Availability -->
        <div class="col-lg-4">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Room Availability</h5>
              <a href="#" class="text-decoration-none text-primary">Details</a>
            </div>
            <div class="room-list">
              <div class="room-item">
                <div class="room-type">
                  <div class="room-icon bg-primary">
                    <i class="bi bi-hospital"></i>
                  </div>
                  <span>General Ward</span>
                </div>
                <div class="room-count">56</div>
              </div>
              <div class="room-item">
                <div class="room-type">
                  <div class="room-icon bg-info">
                    <i class="bi bi-door-closed"></i>
                  </div>
                  <span>Private Room</span>
                </div>
                <div class="room-count">45</div>
              </div>
              <div class="room-item">
                <div class="room-type">
                  <div class="room-icon bg-success">
                    <i class="bi bi-door-open"></i>
                  </div>
                  <span>Semi-private Room</span>
                </div>
                <div class="room-count">32</div>
              </div>
              <div class="room-item">
                <div class="room-type">
                  <div class="room-icon bg-danger">
                    <i class="bi bi-heart-pulse"></i>
                  </div>
                  <span>Emergency Room</span>
                </div>
                <div class="room-count">12</div>
              </div>
              <div class="room-item">
                <div class="room-type">
                  <div class="room-icon bg-success">
                    <i class="bi bi-bandaid"></i>
                  </div>
                  <span>ICU</span>
                </div>
                <div class="room-count">10</div>
              </div>
              <div class="room-item">
                <div class="room-type">
                  <div class="room-icon bg-warning">
                    <i class="bi bi-scissors"></i>
                  </div>
                  <span>Operation Theatre</span>
                </div>
                <div class="room-count">4</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Third Row -->
      <div class="row g-4 mb-4">
        <!-- Most Visited Dept -->
        <div class="col-lg-4">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Most Visited Dept.</h5>
              <a href="#" class="text-decoration-none text-primary">Details</a>
            </div>
            <div class="text-center mb-4">
              <canvas id="deptChart" width="250" height="250"></canvas>
            </div>
            <div class="d-flex justify-content-around">
              <div class="text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                  <div class="me-2" style="width: 12px; height: 12px; border-radius: 50%; background-color: #4CAF50;"></div>
                  <span>60%</span>
                </div>
                <p class="mb-0 small">Cardiology</p>
              </div>
              <div class="text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                  <div class="me-2" style="width: 12px; height: 12px; border-radius: 50%; background-color: #FFC107;"></div>
                  <span>30%</span>
                </div>
                <p class="mb-0 small">Neurology</p>
              </div>
              <div class="text-center">
                <div class="d-flex align-items-center justify-content-center mb-2">
                  <div class="me-2" style="width: 12px; height: 12px; border-radius: 50%; background-color: #2196F3;"></div>
                  <span>10%</span>
                </div>
                <p class="mb-0 small">Dermatology</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Reported Cases -->
        <div class="col-lg-4">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Reported Cases</h5>
              <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="casesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  Neurology
                </button>
                <ul class="dropdown-menu" aria-labelledby="casesDropdown">
                  <li><a class="dropdown-item" href="#">Cardiology</a></li>
                  <li><a class="dropdown-item" href="#">Neurology</a></li>
                  <li><a class="dropdown-item" href="#">Orthopedics</a></li>
                </ul>
              </div>
            </div>
            <div>
              <canvas id="casesChart" height="250"></canvas>
            </div>
            <div class="d-flex justify-content-center mt-3">
              <div class="d-flex align-items-center me-4">
                <div style="width: 12px; height: 12px; background-color: #4285f4; border-radius: 50%; margin-right: 8px;"></div>
                <span>Positive</span>
              </div>
              <div class="d-flex align-items-center">
                <div style="width: 12px; height: 12px; background-color: #fbbc05; border-radius: 50%; margin-right: 8px;"></div>
                <span>Negative</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Reports -->
        <div class="col-lg-4">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Reports</h5>
              <a href="#" class="text-decoration-none text-primary">View all</a>
            </div>
            <div class="reports-list">
              <div class="report-item">
                <div class="report-icon">
                  <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="report-details">
                  <h6 class="report-title">A shower broken in room number 135...</h6>
                  <p class="report-time">1 minute ago</p>
                </div>
                <a href="#" class="report-action">
                  View Report <i class="bi bi-arrow-right"></i>
                </a>
              </div>
              <div class="report-item">
                <div class="report-icon">
                  <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="report-details">
                  <h6 class="report-title">A shower broken in room number 135...</h6>
                  <p class="report-time">1 minute ago</p>
                </div>
                <a href="#" class="report-action">
                  View Report <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Fourth Row -->
      <div class="row g-4">
        <!-- Doctors List -->
        <div class="col-lg-12">
          <div class="dashboard-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Doctors List</h5>
              <a href="#" class="text-decoration-none text-primary">View all</a>
            </div>
            <div class="doctors-list">
              <div class="doctor-list-item">
                <div class="doctor-info">
                  <img src="https://placehold.co/100x100?text=Dr.M" alt="Doctor" class="doctor-list-avatar">
                  <div class="doctor-list-details">
                    <h6>Dr Mamun</h6>
                    <p>Psychiatrist</p>
                  </div>
                </div>
                <div class="doctor-actions">
                  <i class="bi bi-three-dots-vertical"></i>
                </div>
              </div>
              <div class="doctor-list-item">
                <div class="doctor-info">
                  <img src="https://placehold.co/100x100?text=Dr.R" alt="Doctor" class="doctor-list-avatar">
                  <div class="doctor-list-details">
                    <h6>Dr Rebecca</h6>
                    <p>Psychiatrist</p>
                  </div>
                </div>
                <div class="doctor-actions">
                  <i class="bi bi-three-dots-vertical"></i>
                </div>
              </div>
              <div class="doctor-list-item">
                <div class="doctor-info">
                  <img src="https://placehold.co/100x100?text=Dr.E" alt="Doctor" class="doctor-list-avatar">
                  <div class="doctor-list-details">
                    <h6>Dr Emon</h6>
                    <p>Psychiatrist</p>
                  </div>
                </div>
                <div class="doctor-actions">
                  <i class="bi bi-three-dots-vertical"></i>
                </div>
              </div>
              <div class="doctor-list-item">
                <div class="doctor-info">
                  <img src="https://placehold.co/100x100?text=Dr.N" alt="Doctor" class="doctor-list-avatar">
                  <div class="doctor-list-details">
                    <h6>Dr Nadia</h6>
                    <p>Psychiatrist</p>
                  </div>
                </div>
                <div class="doctor-actions">
                  <i class="bi bi-three-dots-vertical"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection