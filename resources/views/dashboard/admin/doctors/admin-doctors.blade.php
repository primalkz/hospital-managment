@extends('layout.dashboard.main')
@section('title', 'Doctors List')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Main Content -->
<link href="{{ asset('css/doctors-list.css') }}" rel="stylesheet">
<main class="main-content" id="mainContent">
    <div class="container-fluid py-4">
      <!-- Page Title with stats -->
      <div class="row mb-4">
        <div class="col-12">
          <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h4 class="mb-0 fw-bold text-dark">Doctors Management</h4>
                <div class="d-flex gap-3 mt-3 mt-md-0 flex-wrap">
                  <div class="stat-card bg-primary bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-primary rounded-circle p-2 me-2">
                        <i class="bi bi-person-badge text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-primary">Total Doctors</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">40</div>
                  </div>
                  <div class="stat-card bg-success bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-success rounded-circle p-2 me-2">
                        <i class="bi bi-check-circle text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-success">Active</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">32</div>
                  </div>
                  <div class="stat-card bg-warning bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-warning rounded-circle p-2 me-2">
                        <i class="bi bi-person-plus text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-warning">New This Week</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">3</div>
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

      <!-- Doctors List Section -->
      <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4">
              <!-- Search and Actions -->
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div class="search-container position-relative">
                  <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                  <input type="text" class="form-control form-control-lg ps-5 rounded-pill border-0 bg-light" placeholder="Search">
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-light rounded-pill px-3 d-flex align-items-center">
                    <i class="bi bi-funnel-fill text-primary me-md-2"></i>
                    <span class="d-none d-md-inline">Filter</span>
                  </button>
                  <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Doctor
                  </button>
                </div>
              </div>

              <!-- Doctors Table -->
              <div class="table-responsive overflow-x-auto doctors-table">
                <table class="table table-borderless align-middle">
                  <thead class="bg-light">
                    <tr>
                      <th class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          DOCTOR <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                        </div>
                      </th>
                      <th class="py-3">
                        <div class="d-flex align-items-center">
                          STATUS <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                        </div>
                      </th>
                      <th class="py-3">
                        <div class="d-flex align-items-center">
                          EMAIL VERIFIED <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                        </div>
                      </th>
                      {{-- <th class="py-3">IMPERSONATE</th> --}}
                      <th class="py-3">
                        <div class="d-flex align-items-center">
                          REGISTERED ON <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                        </div>
                      </th>
                      <th class="py-3 text-end pe-4">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Doctor Row -->
                    @foreach ($doctors as $doctor)
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=WD" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">{{ $doctor->name }}</h6>
                              <div class="ms-2">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">{{ $doctor->email }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          @if($doctor->status == 1)
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch1" checked disabled>
                          @else
                            <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch1" disabled>
                          @endif
                          <label class="form-check-label" for="statusSwitch1"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          @if($doctor->email_verfied_at !== NULL)
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch1" checked disabled>
                          @else
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch1" disabled>
                          @endif
                          <label class="form-check-label" for="emailSwitch1"></label>
                        </div>
                      </td>
                      {{-- <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td> --}}
                      <td>
                        <span class="badge bg-primary px-3 py-2">{{ date('d M Y h:i A', strtotime($doctor->created_at)) }}</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          {{-- <button class="badge badge-primary btn btn-sm btn-light rounded-pill">
                            <i class="bi bi-plus my-2 text-dark"></i>
                          </button>                           --}}
                          <button class="badge badge-primary btn btn-sm btn-primary rounded-pill edit-doctor" data-doctor-id="{{ $doctor->id }}">
                            <i class="bi bi-pencil my-2"></i>
                          </button>
                          <button class="badge badge-primary btn btn-sm btn-danger rounded-pill delete-doctor" data-doctor-id="{{ $doctor->id }}">
                            <i class="bi bi-trash my-2"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <!-- Pagination -->
              <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <span class="me-3 text-muted">Show</span>
                  <select class="form-select form-select-sm me-3" style="width: 70px;">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                  </select>
                  <span class="text-muted">entries</span>
                </div>
                <nav aria-label="Page navigation">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Add Doctor Modal -->
  @include('dashboard.admin.doctors.modals.add-doctor')

  <!-- Edit Doctor Modal -->
  @include('dashboard.admin.doctors.modals.edit-doctor')
  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('admin.doctors.delete', ['id' => ':id']) }}" method="POST" id="deleteDoctorForm">
            @csrf
            @method('DELETE')
            <div class="text-center mb-4">
              <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
            </div>
            <p class="text-center fs-5">Are you sure you want to delete this doctor?</p>
            <p class="text-center text-muted">This action cannot be undone.</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger px-4">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

<script src="{{ asset('js/doctors-list.js') }}"></script>