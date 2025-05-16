@extends('layout.dashboard.main')
@section('title', 'Appointment')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Main Content -->
<link href="{{ asset('css/appointment.css') }}" rel="stylesheet">
<main class="main-content" id="mainContent">
    <div class="container-fluid py-4">
      <!-- Page Title with stats -->
      <div class="row mb-4">
        <div class="col-12">
          <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h4 class="mb-0 fw-bold text-dark">Appointments Management</h4>
                <div class="d-flex gap-3 mt-3 mt-md-0 flex-wrap">
                  <div class="stat-card bg-primary bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-primary rounded-circle p-2 me-2">
                        <i class="bi bi-calendar-check text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-primary">Today's Appointments</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">24</div>
                  </div>
                  <div class="stat-card bg-success bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-success rounded-circle p-2 me-2">
                        <i class="bi bi-check-circle text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-success">Completed</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">18</div>
                  </div>
                  <div class="stat-card bg-warning bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-warning rounded-circle p-2 me-2">
                        <i class="bi bi-clock text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-warning">Pending</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">6</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content Area -->
      <div class="row g-4" style="transition: none;">
        <!-- Appointments List -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Appointment List</h5>
                <div class="appointment-filter d-flex align-items-center gap-2">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                    <ul class="dropdown-menu shadow border-0" aria-labelledby="filterDropdown">
                      <li><a class="dropdown-item" href="#">All Appointments</a></li>
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Week</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Completed</a></li>
                      <li><a class="dropdown-item" href="#">Pending</a></li>
                      <li><a class="dropdown-item" href="#">Cancelled</a></li>
                    </ul>
                  </div>
                  {{-- <form class="search-form position-relative">
                    <input type="search" class="form-control form-control-sm ps-4" placeholder="Search">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                  </form> --}}
                </div>
              </div>

              <ul class="nav nav-pills mb-4" id="appointmentTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active px-4" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link px-4" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab" aria-controls="past" aria-selected="false">Past</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link px-4" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</button>
                </li>
              </ul>

              <div class="tab-content" id="appointmentTabsContent">
                <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                  <!-- Appointment Card -->
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">MAY</div>
                            <div class="date-day fs-4 fw-bold">14</div>
                            <div class="date-time small text-muted">09:30 AM</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Regular Check-up</h6>
                            <span class="badge bg-warning text-white rounded-pill">
                              <i class="bi bi-clock-fill me-1"></i> Pending
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr.E" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Doctor</div>
                              <div class="fw-semibold">Dr. Emon Sheikh</div>
                              <div class="small text-muted">Ophthalmologist</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=JW" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Patient</div>
                              <div class="fw-semibold text-dark">James Wilson</div>
                              <div class="small text-muted">+1 (555) 123-4567</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="bi bi-x-circle"></i> Cancel
                        </button>
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-check-circle"></i> Complete
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Appointment Card -->
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">MAY</div>
                            <div class="date-day fs-4 fw-bold">14</div>
                            <div class="date-time small text-muted">11:00 AM</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Follow-up Visit</h6>
                            <span class="badge bg-warning text-white rounded-pill">
                              <i class="bi bi-clock-fill me-1"></i> Pending
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr.E" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Doctor</div>
                              <div class="fw-semibold">Dr. Emon Sheikh</div>
                              <div class="small text-muted">Ophthalmologist</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=SC" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Patient</div>
                              <div class="fw-semibold">Sophia Chen</div>
                              <div class="small text-muted">+1 (555) 987-6543</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="bi bi-x-circle"></i> Cancel
                        </button>
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-check-circle"></i> Complete
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Appointment Card -->
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">MAY</div>
                            <div class="date-day fs-4 fw-bold">15</div>
                            <div class="date-time small text-muted">10:00 AM</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">New Symptoms</h6>
                            <span class="badge bg-warning text-white rounded-pill">
                              <i class="bi bi-clock-fill me-1"></i> Pending
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr.N" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Doctor</div>
                              <div class="fw-semibold">Dr. Nadia Rahman</div>
                              <div class="small text-muted">Ophthalmologist</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=MR" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Patient</div>
                              <div class="fw-semibold">Michael Rodriguez</div>
                              <div class="small text-muted">+1 (555) 456-7890</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                          <i class="bi bi-x-circle"></i> Cancel
                        </button>
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-check-circle"></i> Complete
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
                  <!-- Appointment Card (Completed) -->
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">MAY</div>
                            <div class="date-day fs-4 fw-bold">10</div>
                            <div class="date-time small text-muted">09:30 AM</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Regular Check-up</h6>
                            <span class="badge bg-success text-white rounded-pill">
                              <i class="bi bi-check-circle-fill me-1"></i> Completed
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr.E" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Doctor</div>
                              <div class="fw-semibold">Dr. Emon Sheikh</div>
                              <div class="small text-muted">Ophthalmologist</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=RH" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Patient</div>
                              <div class="fw-semibold">Robert Harris</div>
                              <div class="small text-muted">+1 (555) 234-5678</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-file-text"></i> View Report
                        </button>
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-calendar-plus"></i> New Appointment
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Appointment Card (Completed) -->
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">MAY</div>
                            <div class="date-day fs-4 fw-bold">8</div>
                            <div class="date-time small text-muted">02:30 PM</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Prescription Renewal</h6>
                            <span class="badge bg-success text-white rounded-pill">
                              <i class="bi bi-check-circle-fill me-1"></i> Completed
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr.R" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Doctor</div>
                              <div class="fw-semibold">Dr. Rebecca Johnson</div>
                              <div class="small text-muted">Ophthalmologist</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=EP" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Patient</div>
                              <div class="fw-semibold">Emily Parker</div>
                              <div class="small text-muted">+1 (555) 876-5432</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-file-text"></i> View Report
                        </button>
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-calendar-plus"></i> New Appointment
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                  <!-- Appointment Card (Cancelled) -->
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">MAY</div>
                            <div class="date-day fs-4 fw-bold">12</div>
                            <div class="date-time small text-muted">11:30 AM</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Test Results Review</h6>
                            <span class="badge bg-danger text-white rounded-pill">
                              <i class="bi bi-x-circle-fill me-1"></i> Cancelled
                            </span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr.N" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Doctor</div>
                              <div class="fw-semibold">Dr. Nadia Rahman</div>
                              <div class="small text-muted">Ophthalmologist</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=JW" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <div class="text-muted small">Patient</div>
                              <div class="fw-semibold text-dark">James Wilson</div>
                              <div class="small text-muted">+1 (555) 123-4567</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex gap-2 justify-content-end">
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-calendar-plus"></i> Reschedule
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-4 text-center">
                <button class="btn btn-outline-primary px-4">Load More</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Appointment Booking Form -->
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 fw-bold">Book New Appointment</h5>
                <div class="step-indicator d-flex align-items-center">
                  <div class="step-dots d-flex gap-2">
                    <div class="step-dot active" data-step="1"></div>
                    <div class="step-dot" data-step="2"></div>
                    <div class="step-dot" data-step="3"></div>
                  </div>
                  <span class="badge bg-primary ms-2 px-3 py-2">Step 1 of 3</span>
                </div>
              </div>
              
              @if ($errors->any())
                <div class="alert alert-danger rounded-lg border-0 shadow-sm">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
            
              <form class="appointment-form" method="POST" action="{{ route('appointment.store') }}">
                @csrf
                <!-- Step 1: Patient Information -->
                <div class="form-step active p-2" id="step1">
                  <div class="card border-0 rounded-lg mb-4" style="background-color:rgba(150, 183, 255, 0.6)">
                  <div class="card-body p-3">
                    <h6 class="card-title d-flex align-items-center mb-3">
                    <span class="step-number bg-primary text-white rounded-circle me-2">1</span>
                    Patient Information
                    </h6>
                    
                    <div class="mb-4">
                    <label class="form-label fw-semibold">Patient Type</label>
                    <div class="d-flex gap-4">
                      <div class="form-check custom-radio">
                      <input class="form-check-input" type="radio" name="patientType" value="existPatient" id="existingPatient" checked>
                      <label class="form-check-label" for="existingPatient">
                        Existing Patient
                      </label>
                      </div>
                      <div class="form-check custom-radio">
                      <input class="form-check-input" type="radio" name="patientType" value="newPatient" id="newPatient">
                      <label class="form-check-label" for="newPatient">
                        New Patient
                      </label>
                      </div>
                    </div>
                    </div>
                    
                    <!-- Existing Patient Form -->
                    <div id="existingPatientForm">
                    <div class="mb-4">
                      <label for="patientSearch" class="form-label fw-semibold">Search Patient</label>
                      <div class="input-group">
                      <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                      </span>
                      <input type="text" class="form-control border-start-0 ps-0" id="patientSearch" placeholder="Type patient name or ID">
                      </div>
                    </div>
                    
                    <div class="selected-patient mb-3">
                      <div class="card border-0 shadow-sm">
                      <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                        <img src="https://placehold.co/100x100?text=JW" alt="Patient" class="rounded-circle border" width="60" height="60">
                        <div class="ms-3">
                          <h6 class="mb-1 fw-bold text-dark">James Wilson</h6>
                          <div class="d-flex flex-wrap gap-3">
                          <span class="badge bg-light text-dark">ID: PT-20240514-001</span>
                          <span class="badge bg-light text-dark">Age: 42</span>
                          <span class="badge bg-light text-dark">Phone: +1 (555) 123-4567</span>
                          </div>
                        </div>
                        </div>
                      </div>
                      </div>
                    </div>
                    </div>

                    <!-- New Patient Form -->
                    <div id="newPatientForm" style="display: none;">
                    <div class="mb-3">
                      <label for="patientName" class="form-label fw-semibold">Patient Name</label>
                      <input type="text" class="form-control" id="patientName" name="patientName" placeholder="Enter patient name" required>
                    </div>

                    <div class="mb-3">
                      <label for="patientEmail" class="form-label fw-semibold">Patient Email</label>
                      <input type="text" class="form-control" id="patientEmail" name="patientEmail" placeholder="Enter patient email" required>
                    </div>
                    
                    <div class="mb-3">
                      <label for="patientMobile" class="form-label fw-semibold">Mobile Number</label>
                      <input type="number" class="form-control" id="patientMobile" name="mobile" placeholder="Enter mobile number" required>
                    </div>
                    
                    <div class="mb-3">
                      <label for="patientDOB" class="form-label fw-semibold">Date of Birth</label>
                      <input type="date" class="form-control" id="patientDOB" name="dob" required>
                    </div>
                    </div>
                  </div>
                  </div>
                  
                  <div class="d-flex justify-content-end mb-2 px-2">
                  <button type="button" class="btn btn-primary px-4" id="nextToStep2">
                    Continue <i class="bi bi-arrow-right ms-1"></i>
                  </button>
                  </div>
                </div>

                <!-- Step 2: Department & Doctor Selection -->
                <div class="form-step p-2" id="step2">
                  <div class="card border-0 rounded-lg mb-4" style="background-color:rgba(150, 183, 255, 0.6)">
                    <div class="card-body p-3">
                      <h6 class="card-title d-flex align-items-center mb-3">
                        <span class="step-number bg-primary text-white rounded-circle me-2">2</span>
                        Department & Doctor
                      </h6>
                      
                      <div class="mb-4">
                        <label for="departmentSelect" class="form-label fw-semibold">Select Department</label>
                        <select name="department" class="form-select" id="departmentSelect" required>
                          <option selected disabled>Choose department</option>
                          <option value="Cardiology">Cardiology</option>
                          <option value="Neurology">Neurology</option>
                          <option value="Ophthalmology">Ophthalmology</option>
                          <option value="Dermatology">Dermatology</option>
                          <option value="Psychiatry">Psychiatry</option>
                          <option value="Orthopedics">Orthopedics</option>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label fw-semibold">Select Doctor</label>
                        
                        <div class="g-3">
                          <div class="col-md-12 mb-2">
                            <div class="doctor-card">
                              <input type="radio" name="doctorSelect" value="doctor1" id="doctor1" class="doctor-card-input" required>
                              <label for="doctor1" class="doctor-card-label card border-0 shadow-sm">
                                <div class="card-body p-3 text-center">
                                  {{-- <img src="https://placehold.co/10x10?text=Dr.E" alt="Doctor" class="rounded-circle border mb-3" width="70" height="70"> --}}
                                  <h6 class="fw-bold mb-1 text-primary">Dr. Emon Sheikh</h6>
                                  <p class="text-muted small mb-2">Ophthalmologist</p>
                                  <div class="doctor-rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                    <span class="ms-1 small text-dark">4.8</span>
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                          
                          <div class="col-md-12 mb-2">
                            <div class="doctor-card">
                              <input type="radio" name="doctorSelect" value="doctor2" id="doctor2" class="doctor-card-input" required>
                              <label for="doctor2" class="doctor-card-label card border-0 shadow-sm">
                                <div class="card-body p-3 text-center">
                                  {{-- <img src="https://placehold.co/10x10?text=Dr.N" alt="Doctor" class="rounded-circle border mb-3" width="70" height="70"> --}}
                                  <h6 class="fw-bold mb-1 text-primary">Dr. Nadia Rahman</h6>
                                  <p class="text-muted small mb-2">Ophthalmologist</p>
                                  <div class="doctor-rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <span class="ms-1 small text-dark">4.1</span>
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                          
                          <div class="col-md-12 mb-2">
                            <div class="doctor-card">
                              <input type="radio" name="doctorSelect" value="doctor3" id="doctor3" class="doctor-card-input" required>
                              <label for="doctor3" class="doctor-card-label card border-0 shadow-sm">
                                <div class="card-body p-3 text-center">
                                  {{-- <img src="https://placehold.co/10x10?text=Dr.R" alt="Doctor" class="rounded-circle border mb-3" width="70" height="70"> --}}
                                  <h6 class="fw-bold mb-1 text-primary">Dr. Rebecca Johnson</h6>
                                  <p class="text-muted small mb-2">Ophthalmologist</p>
                                  <div class="doctor-rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <span class="ms-1 small text-dark">5.0</span>
                                  </div>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-between mb-2 px-2">
                    <button type="button" class="btn btn-light px-4" id="backToStep1">
                      <i class="bi bi-arrow-left me-1"></i> Back
                    </button>
                    <button type="button" class="btn btn-primary px-4" id="nextToStep3">
                      Continue <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                  </div>
                </div>
                
                <!-- Step 3: Date & Time Selection -->
                <div class="form-step p-2" id="step3">
                  <div class="card border-0 rounded-lg mb-4" style="background-color:rgba(150, 183, 255, 0.6)">
                    <div class="card-body p-3">
                      <h6 class="card-title d-flex align-items-center mb-3">
                        <span class="step-number bg-primary text-white rounded-circle me-2">3</span>
                        Appointment Date & Time
                      </h6>
                      
                      <div class="mb-4">
                        <label class="form-label fw-semibold">Select Date *(required)</label>
                        <div class="input-group">
                          <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-calendar"></i>
                          </span>
                          <input type="date" class="form-control border-start-0" id="dateAppoint" name="dateAppoint" min="{{ date('Y-m-d') }}" required>
                        </div>
                        </div>
                        
                        <div class="mb-4">
                        <label class="form-label fw-semibold">Select Time Slot *(required)</label>
                        <div class="g-3">
                          <div class="col-md-12 mb-1">
                          <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-3">
                            <h6 class="card-title text-primary mb-3">Morning</h6>
                            <div class="time-slots">
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time1" class="time-slot-input" value="09:00" required>
                            <label for="time1" class="time-slot-label">09:00 AM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time2" class="time-slot-input" value="09:30" checked required>
                            <label for="time2" class="time-slot-label">09:30 AM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time3" class="time-slot-input" value="10:00" required>
                            <label for="time3" class="time-slot-label">10:00 AM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time4" class="time-slot-input" value="10:30" disabled>
                            <label for="time4" class="time-slot-label">10:30 AM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time5" class="time-slot-input" value="11:00" required>
                            <label for="time5" class="time-slot-label">11:00 AM</label>
                            </div>
                            <div class="time-slot-item">
                            <input type="radio" name="timeSlot" id="time6" class="time-slot-input" value="11:30" required>
                            <label for="time6" class="time-slot-label">11:30 AM</label>
                            </div>
                            </div>
                            </div>
                          </div>
                          </div>
                          
                          <div class="col-md-12 mb-1">
                          <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-3">
                            <h6 class="card-title text-primary mb-3">Afternoon</h6>
                            <div class="time-slots">
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time7" class="time-slot-input" value="13:00" disabled>
                            <label for="time7" class="time-slot-label">01:00 PM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time8" class="time-slot-input" value="13:30" disabled>
                            <label for="time8" class="time-slot-label">01:30 PM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time9" class="time-slot-input" value="14:00" required>
                            <label for="time9" class="time-slot-label">02:00 PM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time10" class="time-slot-input" value="14:30" required>
                            <label for="time10" class="time-slot-label">02:30 PM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time11" class="time-slot-input" value="15:00" required>
                            <label for="time11" class="time-slot-label">03:00 PM</label>
                            </div>
                            <div class="time-slot-item">
                            <input type="radio" name="timeSlot" id="time12" class="time-slot-input" value="15:30" required>
                            <label for="time12" class="time-slot-label">03:30 PM</label>
                            </div>
                            </div>
                            </div>
                          </div>
                          </div>
                          
                          <div class="col-md-12 mb-1">
                          <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-3">
                            <h6 class="card-title text-primary mb-3">Evening</h6>
                            <div class="time-slots">
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time13" class="time-slot-input" value="16:00" required>
                            <label for="time13" class="time-slot-label">04:00 PM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time14" class="time-slot-input" value="16:30" required>
                            <label for="time14" class="time-slot-label">04:30 PM</label>
                            </div>
                            <div class="time-slot-item mb-2">
                            <input type="radio" name="timeSlot" id="time15" class="time-slot-input" value="17:00" required>
                            <label for="time15" class="time-slot-label">05:00 PM</label>
                            </div>
                            <div class="time-slot-item">
                            <input type="radio" name="timeSlot" id="time16" class="time-slot-input" value="17:30" required>
                            <label for="time16" class="time-slot-label">05:30 PM</label>
                            </div>
                            </div>
                            </div>
                          </div>
                          </div>
                        </div>
                        </div>
                        
                        <div class="mb-3">
                        <label for="appointmentReason" class="form-label fw-semibold">Reason for Appointment *(required)</label>
                        <select name="appointmentReason" class="form-select" id="appointmentReason" required>
                          <option selected disabled>Select reason</option>
                          <option value="regular_checkup">Regular Check-up</option>
                          <option value="follow_up">Follow-up Visit</option>
                          <option value="new_symptoms">New Symptoms</option>
                          <option value="prescription_renewal">Prescription Renewal</option>
                          <option value="test_results_review">Test Results Review</option>
                          <option value="other">Other</option>
                        </select>
                        </div>
                        
                        <div class="mb-3">
                        <label for="appointmentNotes" class="form-label fw-semibold">Additional Notes *(required)</label>
                        <textarea class="form-control" name="appointmentNotes" id="appointmentNotes" rows="3" placeholder="Provide any other reason for appointment or details about your condition or specific needs" required></textarea>
                        </div>
                      </div>
                      </div>
                      
                  <div class="d-flex justify-content-between mb-2 px-2">
                    <button type="button" class="btn btn-light px-4" id="backToStep2">
                      <i class="bi bi-arrow-left me-1"></i> Back
                    </button>
                    <button type="submit" class="btn btn-success px-4">
                      <i class="bi bi-calendar-check me-1"></i> Book Appointment
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
          <!-- Doctor Schedule Card -->
          <div class="mt-4">
            <div class="card border-0 shadow-sm rounded-lg">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 class="mb-0 fw-bold">Doctor's Schedule</h5>
                  <button class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-calendar3 me-1"></i> View Full Calendar
                  </button>
                </div>
                
                <div class="schedule-timeline d-flex gap-3 overflow-auto pb-2">
                  <div class="schedule-day">
                    <div class="card border-0 shadow-sm">
                      <div class="card-body p-3">
                        <div class="schedule-date text-center mb-3">
                          <span class="schedule-weekday d-block text-primary fw-bold">Today</span>
                          <span class="schedule-day-num d-block fs-4 fw-bold">14</span>
                        </div>
                        <div class="schedule-appointments">
                          <div class="schedule-appointment-item card border-0 bg-light mb-2">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">09:30 AM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">James Wilson</h6>
                                <p class="mb-0 small text-muted">Regular Check-up</p>
                              </div>
                            </div>
                          </div>
                          <div class="schedule-appointment-item card border-0 bg-light">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">11:00 AM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">Sophia Chen</h6>
                                <p class="mb-0 small text-muted">Follow-up Visit</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="schedule-day">
                    <div class="card border-0 shadow-sm">
                      <div class="card-body p-3">
                        <div class="schedule-date text-center mb-3">
                          <span class="schedule-weekday d-block text-muted">Wed</span>
                          <span class="schedule-day-num d-block fs-4 fw-bold">15</span>
                        </div>
                        <div class="schedule-appointments">
                          <div class="schedule-appointment-item card border-0 bg-light mb-2">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">10:00 AM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">Robert Harris</h6>
                                <p class="mb-0 small text-muted">Prescription Renewal</p>
                              </div>
                            </div>
                          </div>
                          <div class="schedule-appointment-item card border-0 bg-light mb-2">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">02:15 PM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">Michael Rodriguez</h6>
                                <p class="mb-0 small text-muted">New Symptoms</p>
                              </div>
                            </div>
                          </div>
                          <div class="schedule-appointment-item card border-0 bg-light">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">04:45 PM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">Emily Parker</h6>
                                <p class="mb-0 small text-muted">Test Results Review</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="schedule-day">
                    <div class="card border-0 shadow-sm">
                      <div class="card-body p-3">
                        <div class="schedule-date text-center mb-3">
                          <span class="schedule-weekday d-block text-muted">Thu</span>
                          <span class="schedule-day-num d-block fs-4 fw-bold">16</span>
                        </div>
                        <div class="schedule-appointments">
                          <div class="schedule-appointment-item card border-0 bg-light mb-2">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">09:00 AM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">David Thompson</h6>
                                <p class="mb-0 small text-muted">Regular Check-up</p>
                              </div>
                            </div>
                          </div>
                          <div class="schedule-appointment-item card border-0 bg-light">
                            <div class="card-body p-2">
                              <div class="schedule-time badge bg-primary mb-1">03:30 PM</div>
                              <div class="schedule-info">
                                <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
                                <p class="mb-0 small text-muted">Follow-up Visit</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

<script src="{{ asset('js/appointment.js') }}"></script>