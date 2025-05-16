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
                    <div class="stat-value fw-bold fs-4">{{ $appointments->where('appointment_date', date('Y-m-d'))->count() }}</div>
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

      @if ($errors->any())
        <div class="alert alert-danger rounded-lg border-0 shadow-sm">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (session('success'))
        <div class="alert alert-success rounded-3 shadow-md">
          {{ session('success') }}
        </div>
      @endif

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
                  <button class="nav-link active px-4" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true">All</button>
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
                  @foreach ($appointments as $appointment)
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">{{ strtoupper(date('M', strtotime($appointment->appointment_date))) }}</div>
                            <div class="date-day fs-4 fw-bold">{{ date('d', strtotime($appointment->appointment_date)) }}</div>
                            <div class="date-time small text-muted">{{ date('h:i A', strtotime($appointment->appointment_time)) }}</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">{{ $appointment->reason }}</h6>
                            @if ($appointment->status == 'pending')
                            <span class="badge bg-warning text-white rounded-pill">{{ ucfirst($appointment->status) }}</span>
                            @elseif ($appointment->status == 'cancelled')
                            <span class="badge bg-danger text-white rounded-pill">{{ ucfirst($appointment->status) }}</span>
                            @else
                            <span class="badge bg-success text-white rounded-pill">{{ ucfirst($appointment->status) }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      
                      <div class="row g-3 mb-3">
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=Dr" alt="Doctor" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <h6 class="mb-1">Dr. {{ $appointment->doctor ? $appointment->doctor->name : 'Unknown Doctor' }}</h6>
                              <small class="text-muted">{{ $appointment->department ?? 'Department not specified' }}</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex align-items-center">
                            <img src="https://placehold.co/120x120?text=P" alt="Patient" class="rounded-circle border" width="50" height="50">
                            <div class="ms-3">
                              <h6 class="mb-1">{{ $appointment->patient ? $appointment->patient->name : 'Unknown Patient' }}</h6>
                              <small class="text-muted">Patient</small>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex gap-2 justify-content-end">
                        @if ($appointment->status != 'completed' && $appointment->status != 'cancelled')
                        <button class="btn btn-sm btn-outline-secondary" onclick="showEditModal('{{ $appointment->id }}', '{{ $appointment->appointment_date }}', '{{ $appointment->appointment_time }}', '{{ $appointment->reason }}', '{{ $appointment->notes }}', '{{ $appointment->status }}')">
                          <i class="bi bi-pencil"></i> Edit
                        </button>
                        @endif

                        @if ($appointment->status != 'cancelled')
                        <button class="btn btn-sm btn-outline-danger" onclick="showCancelModal('{{ $appointment->id }}')">
                          <i class="bi bi-x-circle"></i> Cancel
                        </button>
                        @endif

                        @if ($appointment->status == 'completed')
                        <button class="btn btn-sm btn-primary">
                          <i class="bi bi-file-text"></i> View Report
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>

                <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
                  <!-- Appointment Card (Completed) -->
                @foreach ($appointments->where('status', 'completed') as $appointment)
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">{{ strtoupper(date('M', strtotime($appointment->appointment_date))) }}</div>
                            <div class="date-day fs-4 fw-bold">{{ date('d', strtotime($appointment->appointment_date)) }}</div>
                            <div class="date-time small text-muted">{{ date('h:i A', strtotime($appointment->appointment_time)) }}</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Regular Check-up</h6>
                            @if ($appointment->status == 'pending')
                            <span class="badge bg-warning text-white rounded-pill">
                              <i class="bi bi-clock-fill me-1"></i> {{ $appointment->status }}
                            </span>
                            @elseif ($appointment->status == 'cancelled')
                            <span class="badge bg-danger text-white rounded-pill">
                              <i class="bi bi-x-circle-fill me-1"></i> {{ $appointment->status }}
                            </span>
                            @else
                            <span class="badge bg-success text-white rounded-pill">
                              <i class="bi bi-check-circle-fill me-1"></i> {{ $appointment->status }}
                            </span>
                            @endif
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
                              <div class="fw-semibold text-dark">{{  $appointment->patient->name }}</div>
                              <div class="small text-muted">{{ $appointment->patient->mobile }}</div>
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
                @endforeach
                </div>

                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                  <!-- Appointment Card (Cancelled) -->
                @foreach ($appointments->where('status', 'cancelled') as $appointment)
                  <div class="card border-0 shadow-sm rounded-lg mb-3">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                          <div class="date-box text-center me-3 bg-light rounded-lg p-2">
                            <div class="date-month text-primary small fw-bold">{{ strtoupper(date('M', strtotime($appointment->appointment_date))) }}</div>
                            <div class="date-day fs-4 fw-bold">{{ date('d', strtotime($appointment->appointment_date)) }}</div>
                            <div class="date-time small text-muted">{{ date('h:i A', strtotime($appointment->appointment_time)) }}</div>
                          </div>
                          <div>
                            <h6 class="mb-1 fw-bold">Regular Check-up</h6>
                            @if ($appointment->status == 'pending')
                            <span class="badge bg-warning text-white rounded-pill">
                              <i class="bi bi-clock-fill me-1"></i> {{ $appointment->status }}
                            </span>
                            @elseif ($appointment->status == 'cancelled')
                            <span class="badge bg-danger text-white rounded-pill">
                              <i class="bi bi-x-circle-fill me-1"></i> {{ $appointment->status }}
                            </span>
                            @else
                            <span class="badge bg-success text-white rounded-pill">
                              <i class="bi bi-check-circle-fill me-1"></i> {{ $appointment->status }}
                            </span>
                            @endif
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
                              <div class="fw-semibold text-dark">{{  $appointment->patient->name }}</div>
                              <div class="small text-muted">{{ $appointment->patient->mobile }}</div>
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
                @endforeach
                </div>
              </div>

              <div class="mt-4 text-center">
                <button class="btn btn-outline-primary px-4">Load More</button>
              </div>
            </div>
          </div>
        </div>

        @include('dashboard.appointment.add-appointment-form')
      </div>
    </div>
  </main>
  @include('dashboard.modals.appointment-edit')
  @include('dashboard.modals.appointment-cancel')
@endsection

<script src="{{ asset('js/appointment.js') }}"></script>