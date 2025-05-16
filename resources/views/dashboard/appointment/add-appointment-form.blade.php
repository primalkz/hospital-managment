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
              
              <div class="selected-patients mb-3">
                <div class="patient-search-results">
                  <input type="hidden" id="selectedPatientId" name="patient_id" value="">
                  @foreach($patients as $patient)
                  <div class="patient-card">
                    <div class="card border-0 shadow-sm mb-2 patient-card-wrapper">
                      <input type="radio" name="patientSelect" id="patient{{ $patient->id }}" 
                             class="patient-card-input" value="{{ $patient->id }}"
                             onchange="document.getElementById('patientSearch').value='{{ $patient->name }}'; document.getElementById('selectedPatientId').value='{{ $patient->id }}';">
                      <label for="patient{{ $patient->id }}" class="patient-card-label w-100 mb-0">
                        <div class="card-body p-3">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                              <div class="radio-check me-3">
                                <div class="radio-circle"></div>
                              </div>
                              <img src="https://placehold.co/100x100?text={{ substr($patient->name, 0, 2) }}" alt="Patient" class="rounded-circle border" width="60" height="60">
                              <div class="ms-3">
                                <h6 class="mb-1 fw-bold text-dark">{{ $patient->name }}</h6>
                                <div class="d-flex flex-wrap gap-2">
                                  <span class="badge bg-light text-dark">ID: PT-{{ str_pad($patient->id, 6, '0', STR_PAD_LEFT) }}</span>
                                  @if($patient->dob)
                                  <span class="badge bg-light text-dark">Age: {{ \Carbon\Carbon::parse($patient->dob)->age }}</span>
                                  @endif
                                  @if($patient->mobile)
                                  <span class="badge bg-light text-dark">Phone: {{ $patient->mobile }}</span>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </label>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- New Patient Form -->
            <div id="newPatientForm" style="display: none;">
            <div class="mb-3">
              <label for="patientName" class="form-label fw-semibold">Patient Name</label>
              <input type="text" class="form-control" id="patientName" name="patientName" placeholder="Enter patient name" >
            </div>
            <div class="mb-3">
              <label for="patientEmail" class="form-label fw-semibold">Patient Email</label>
              <input type="text" class="form-control" id="patientEmail" name="patientEmail" placeholder="Enter patient email" >
            </div>
            
            <div class="mb-3">
              <label for="patientMobile" class="form-label fw-semibold">Mobile Number</label>
              <input type="number" class="form-control" id="patientMobile" name="mobile" placeholder="Enter mobile number" >
            </div>
            
            <div class="mb-3">
              <label for="patientDOB" class="form-label fw-semibold">Date of Birth</label>
              <input type="date" class="form-control" id="patientDOB" name="dob" >
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
                <label for="departmentSelect" class="form-label fw-semibold">Select Department (Don't choose this is under development)</label>
                <select name="department" class="form-select" id="departmentSelect">
                  <option value="">Others (Use this)</option>
                  <option value="Cardiology">Cardiology</option>
                  <option value="Neurology">Neurology</option>
                  <option value="Ophthalmology">Ophthalmology</option>
                  <option value="Dermatology">Dermatology</option>
                  <option value="Psychiatry">Psychiatry</option>
                  <option value="Orthopedics">Orthopedics</option>
                  <option value="Pediatrics">Pediatrics</option>
                  <option value="Gynecology">Gynecology</option>
                  <option value="Urology">Urology</option>
                  <option value="ENT">ENT (Ear, Nose, and Throat)</option>
                  <option value="Dental">Dental</option>
                  <option value="Pulmonology">Pulmonology</option>
                  <option value="Endocrinology">Endocrinology</option>
                  <option value="Gastroenterology">Gastroenterology</option>
                  <option value="Oncology">Oncology</option>
                </select>
              </div>
              
              <div class="mb-3">
                <label class="form-label fw-semibold">Select Doctor</label>
                <div class="doctor-list row g-3">
                  @foreach($doctors as $doctor)
                  <div class="col-md-6 doctor-card-wrapper" data-specialty="{{ $doctor->specialty }}">
                    <div class="doctor-card">
                      <input type="radio" name="doctor_id" value="{{ $doctor->id }}" id="doctor{{ $doctor->id }}" class="doctor-card-input" required>
                      <label for="doctor{{ $doctor->id }}" class="doctor-card-label card border-0 shadow-sm h-100">
                        <div class="card-body p-3">
                          <div class="d-flex align-items-center">
                            {{-- <img src="{{ $doctor->profile_image ?? '' }}" alt="Doctor" class="rounded-circle border me-3" width="70" height="70"> --}}
                            <div>
                              <h6 class="fw-bold mb-1 text-primary">Dr. {{ $doctor->name }}</h6>
                              <p class="text-muted small mb-2">{{ $doctor->specialty }}</p>
                              <div class="doctor-stats d-flex gap-2">
                                <span class="badge bg-light text-dark">
                                  <i class="bi bi-briefcase-fill me-1"></i> {{ $doctor->experience_years ?? '5' }}+ Years
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </label>
                    </div>
                  </div>
                  @endforeach
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
<script src="{{ asset('js/appointment-form.js') }}"></script>