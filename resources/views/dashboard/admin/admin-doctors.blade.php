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
                <div class="d-flex gap-3 mt-3 mt-md-0">
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
              <div class="table-responsive doctors-table">
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
                      <th class="py-3">IMPERSONATE</th>
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
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=WD" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">Whodis Doctor</h6>
                              <div class="ms-2">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">sms1998.ss@gmail.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch1" checked>
                          <label class="form-check-label" for="statusSwitch1"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch1" checked>
                          <label class="form-check-label" for="emailSwitch1"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">13 May 2025 06:11 AM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Doctor Row -->
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=JI" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">John Infyom</h6>
                              <div class="ms-2">
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">nylefetet@mailinator.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch2" checked>
                          <label class="form-check-label" for="statusSwitch2"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch2" checked>
                          <label class="form-check-label" for="emailSwitch2"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">08 May 2025 06:32 AM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Doctor Row -->
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=MP" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">medicoprova prova</h6>
                              <div class="ms-2">
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">medico@gmail.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch3" checked>
                          <label class="form-check-label" for="statusSwitch3"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch3" checked>
                          <label class="form-check-label" for="emailSwitch3"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">04 May 2025 08:03 PM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Doctor Row -->
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=FH" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">fady hal</h6>
                              <div class="ms-2">
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">fhalabi2k@gmail.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch4" checked>
                          <label class="form-check-label" for="statusSwitch4"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch4" checked>
                          <label class="form-check-label" for="emailSwitch4"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">23 Mar 2025 07:56 AM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Doctor Row -->
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=AS" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">ahmed salih</h6>
                              <div class="ms-2">
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">ahmed@smithson.co</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch5" checked>
                          <label class="form-check-label" for="statusSwitch5"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch5" checked>
                          <label class="form-check-label" for="emailSwitch5"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">06 Feb 2025 09:40 AM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Doctor Row -->
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=AT" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">Alfonso tt</h6>
                              <div class="ms-2">
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">rr@ewewe.es</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch6" checked>
                          <label class="form-check-label" for="statusSwitch6"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch6" checked>
                          <label class="form-check-label" for="emailSwitch6"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">05 Feb 2025 07:57 PM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Doctor Row -->
                    <tr class="border-bottom">
                      <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                          <img src="https://placehold.co/100x100?text=AK" alt="Doctor" class="rounded-circle me-3" width="50" height="50">
                          <div>
                            <div class="d-flex align-items-center">
                              <h6 class="mb-0 fw-bold">AA KK</h6>
                              <div class="ms-2">
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                              </div>
                            </div>
                            <p class="mb-0 text-muted small">hassna@gmail.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch7" checked>
                          <label class="form-check-label" for="statusSwitch7"></label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="emailSwitch7" checked>
                          <label class="form-check-label" for="emailSwitch7"></label>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3">Impersonate</button>
                      </td>
                      <td>
                        <span class="badge bg-primary px-3 py-2">04 Feb 2025 10:20 PM</span>
                      </td>
                      <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-plus"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-pencil text-primary"></i>
                          </button>
                          <button class="btn btn-light btn-sm rounded-circle">
                            <i class="bi bi-trash text-danger"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
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
  <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form id="addDoctorForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" required>
              </div>
              <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" required>
              </div>
              <div class="col-md-6">
                <label for="specialty" class="form-label">Specialty</label>
                <select class="form-select" id="specialty" required>
                  <option value="" selected disabled>Select specialty</option>
                  <option value="cardiology">Cardiology</option>
                  <option value="dermatology">Dermatology</option>
                  <option value="endocrinology">Endocrinology</option>
                  <option value="gastroenterology">Gastroenterology</option>
                  <option value="neurology">Neurology</option>
                  <option value="obstetrics">Obstetrics & Gynecology</option>
                  <option value="ophthalmology">Ophthalmology</option>
                  <option value="orthopedics">Orthopedics</option>
                  <option value="pediatrics">Pediatrics</option>
                  <option value="psychiatry">Psychiatry</option>
                  <option value="urology">Urology</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="experience" class="form-label">Years of Experience</label>
                <input type="number" class="form-control" id="experience" min="0" required>
              </div>
              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" required>
              </div>
              <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" required>
              </div>
              <div class="col-md-6">
                <label for="zipCode" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zipCode" required>
              </div>
              <div class="col-12">
                <label for="bio" class="form-label">Biography</label>
                <textarea class="form-control" id="bio" rows="3"></textarea>
              </div>
              <div class="col-md-6">
                <label for="profileImage" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="profileImage">
              </div>
              <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <div class="form-check form-switch mt-2">
                  <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch" checked>
                  <label class="form-check-label" for="statusSwitch">Active</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary px-4">
            <i class="bi bi-plus-lg me-2"></i> Add Doctor
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="text-center mb-4">
            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
          </div>
          <p class="text-center fs-5">Are you sure you want to delete this doctor?</p>
          <p class="text-center text-muted">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger px-4">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection

<script src="{{ asset('js/doctors-list.js') }}"></script>