@extends('layout.dashboard.main')
@section('title', 'Patients List')
@section('content')

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
                <h4 class="mb-0 fw-bold text-dark">Patients Management</h4>
                <div class="d-flex gap-3 mt-3 mt-md-0 flex-wrap">
                  <div class="stat-card bg-primary bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-primary rounded-circle p-2 me-2">
                        <i class="bi bi-people-fill text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-primary">Total Patients</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">{{ $patients->count() }}</div>
                  </div>
                  <div class="stat-card bg-success bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-success rounded-circle p-2 me-2">
                        <i class="bi bi-check-circle text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-success">Active</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">{{ $patients->where('status', 1)->count() }}</div>
                  </div>
                  <div class="stat-card bg-warning bg-opacity-10 rounded-lg p-3">
                    <div class="d-flex align-items-center mb-2">
                      <div class="stat-icon bg-warning rounded-circle p-2 me-2">
                        <i class="bi bi-person-plus text-white"></i>
                      </div>
                      <h6 class="stat-title mb-0 text-warning">New This Week</h6>
                    </div>
                    <div class="stat-value fw-bold fs-4">{{ $patients->where('created_at', '>=', now()->subWeek())->count() }}</div>
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

      <!-- Patients List Section -->
      <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-4">
              <!-- Search and Actions -->
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div class="search-container position-relative">
                  <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                  <input type="text" class="form-control form-control-lg ps-5 rounded-pill border-0 bg-light" placeholder="Search patient name or email">
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-light rounded-pill px-3 d-flex align-items-center">
                    <i class="bi bi-funnel-fill text-primary me-md-2"></i>
                    <span class="d-none d-md-inline">Filter</span>
                  </button>
                  <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Patient
                  </button>
                </div>
              </div>

              <!-- Patients Table -->
              <div class="table-responsive overflow-x-auto">
                <table class="table table-borderless align-middle">
                  <thead class="bg-light">
                    <tr>
                      <th class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          PATIENT <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
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
                      <th class="py-3">
                        <div class="d-flex align-items-center">
                          REGISTERED ON <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                        </div>
                      </th>
                      <th class="py-3 text-end pe-4">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($patients as $patient)
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="{{ $patient->profile_image ? asset('storage/' . $patient->profile_image) : 'https://placehold.co/100x100?text=P' }}" 
                               alt="Patient" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <h6 class="mb-0 fw-bold">{{ $patient->name }}</h6>
                            <p class="mb-0 text-muted small">{{ $patient->email }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" 
                                 {{ $patient->status == 1 ? 'checked' : '' }} disabled>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" 
                                 {{ $patient->email_verified_at ? 'checked' : '' }} disabled>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">{{ date('d M Y h:i A', strtotime($patient->created_at)) }}</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end align-items-center gap-2">
                          <button class="badge badge-primary btn btn-sm btn-primary rounded-pill edit-patient mb-3" 
                                  data-patient-id="{{ $patient->id }}">
                            <i class="bi bi-pencil my-2"></i>
                          </button>
                          <form action="{{ route('admin.patients.delete', $patient->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge badge-primary btn btn-sm btn-danger rounded-pill" 
                                    onclick="return confirm('Are you sure you want to delete this patient?')">
                              <i class="bi bi-trash my-2"></i>
                            </button>
                          </form>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Include Modals -->
  @include('dashboard.admin.patients.modals.add-patient')
  @include('dashboard.admin.patients.modals.edit-patient')

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Edit patient functionality - only for populating the edit form
    const editButtons = document.querySelectorAll('.edit-patient');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const patientId = this.getAttribute('data-patient-id');
            
            fetch(`/admin/patients/${patientId}`)
                .then(response => response.json())
                .then(patient => {
                    const form = document.getElementById('editPatientForm');
                    form.action = `/admin/patients/${patientId}`;
                    
                    // Populate form fields
                    document.getElementById('edit_name').value = patient.name;
                    document.getElementById('edit_email').value = patient.email;
                    document.getElementById('edit_mobile').value = patient.mobile;
                    document.getElementById('edit_address').value = patient.address;
                    document.getElementById('edit_city').value = patient.city;
                    document.getElementById('edit_zip_code').value = patient.zip_code;
                    document.getElementById('edit_status').checked = patient.status === 1;
                    
                    if (patient.profile_image) {
                        const currentImage = document.getElementById('current_image');
                        currentImage.innerHTML = `<img src="/storage/${patient.profile_image}" alt="Current profile image" class="img-thumbnail" style="max-width: 100px;">`;
                    }
                    
                    const editModal = new bootstrap.Modal(document.getElementById('editPatientModal'));
                    editModal.show();
                })
                .catch(error => {
                    console.error('Error fetching patient details:', error);
                    alert('Failed to load patient details. Please try again.');
                });
        });
    });

    // Search functionality
    const searchInput = document.querySelector('.search-container input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const patientRows = document.querySelectorAll('tbody tr');
            
            patientRows.forEach(row => {
                const patientName = row.querySelector('h6').textContent.toLowerCase();
                const patientEmail = row.querySelector('p').textContent.toLowerCase();
                
                if (patientName.includes(searchTerm) || patientEmail.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});</script>
