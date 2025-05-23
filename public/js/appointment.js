document.addEventListener('DOMContentLoaded', function() {
  // Form step navigation elements
  const step1 = document.getElementById('step1');
  const step2 = document.getElementById('step2');
  const step3 = document.getElementById('step3');
  
  const nextToStep2 = document.getElementById('nextToStep2');
  const backToStep1 = document.getElementById('backToStep1');
  const nextToStep3 = document.getElementById('nextToStep3');
  const backToStep2 = document.getElementById('backToStep2');
  
  const stepDots = document.querySelectorAll('.step-dot');
  const stepIndicator = document.querySelector('.step-indicator .badge');

  // Validation functions for each step
  function validateStep1() {
    const patientType = document.querySelector('input[name="patientType"]:checked');
    if (!patientType) {
      showError('Please select patient type');
      return false;
    }

    if (patientType.value === 'existPatient') {
      // For existing patient, check if one is selected
      const patientSearch = document.getElementById('patientSearch');
      if (!patientSearch.value) {
        showError('Please search and select a patient');
        return false;
      }
    } else {
      // For new patient, validate required fields
      const patientName = document.getElementById('patientName');
      const patientMobile = document.getElementById('patientMobile');
      const patientDOB = document.getElementById('patientDOB');

      if (!patientName.value) {
        showError('Please enter patient name');
        return false;
      }
      if (!patientMobile.value) {
        showError('Please enter mobile number');
        return false;
      }
      if (!patientDOB.value) {
        showError('Please enter date of birth');
        return false;
      }
    }
    return true;
  }

  function validateStep2() {
    const department = document.getElementById('departmentSelect');
    const doctor = document.querySelector('input[name="doctorSelect"]:checked');

    if (!department.value || department.value === 'Choose department') {
      showError('Please select a department');
      return true;
    }
    if (!doctor) {
      showError('Please select a doctor');
      return false;
    }
    return true;
  }

  function validateStep3() {
    const dateAppoint = document.getElementById('dateAppoint');
    const timeSlot = document.querySelector('input[name="timeSlot"]:checked');

    if (!dateAppoint.value) {
      showError('Please select appointment date');
      return false;
    }
    if (!timeSlot) {
      showError('Please select appointment time');
      return false;
    }
    return true;
  }

  // Error display function
  function showError(message) {
    // Remove any existing error messages
    const existingError = document.querySelector('.alert-danger');
    if (existingError) {
      existingError.remove();
    }

    // Create and show new error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'alert alert-danger alert-dismissible fade show mt-3';
    errorDiv.innerHTML = `
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    // Insert error message at the top of the current active step
    const activeStep = document.querySelector('.form-step.active');
    activeStep.insertBefore(errorDiv, activeStep.firstChild);

    // Auto dismiss after 3 seconds
    setTimeout(() => {
      errorDiv.remove();
    }, 3000);
  }

  // Navigation event listeners with validation
  if (nextToStep2) {
    nextToStep2.addEventListener('click', function() {
      if (validateStep1()) {
        step1.classList.remove('active');
        step2.classList.add('active');
        updateStepIndicator(2);
      }
    });
  }
  
  if (backToStep1) {
    backToStep1.addEventListener('click', function() {
      step2.classList.remove('active');
      step1.classList.add('active');
      updateStepIndicator(1);
    });
  }
  
  if (nextToStep3) {
    nextToStep3.addEventListener('click', function() {
      if (validateStep2()) {
        step2.classList.remove('active');
        step3.classList.add('active');
        updateStepIndicator(3);
      }
    });
  }
  
  if (backToStep2) {
    backToStep2.addEventListener('click', function() {
      step3.classList.remove('active');
      step2.classList.add('active');
      updateStepIndicator(2);
    });
  }

  // Form submission validation
  const appointmentForm = document.querySelector('.appointment-form');
  if (appointmentForm) {
    appointmentForm.addEventListener('submit', function(e) {
      e.preventDefault();
      if (!validateStep3()) {
        return;
      }
      // If all validations pass, submit the form
      this.submit();
    });
  }
  
  function updateStepIndicator(step) {
    // Update step dots
    stepDots.forEach((dot, index) => {
      if (index + 1 <= step) {
        dot.classList.add('active');
      } else {
        dot.classList.remove('active');
      }
    });
    
    // Update step text
    if (stepIndicator) {
      stepIndicator.textContent = `Step ${step} of 3`;
    }
  }
  
  // Patient search functionality
  const patientSearch = document.getElementById('patientSearch');
  if (patientSearch) {
    patientSearch.addEventListener('input', function() {
      // Here you would typically make an AJAX call to search for patients
      console.log('Searching for: ' + this.value);
    });
  }
  
  // Department selection changes available doctors
  const departmentSelect = document.getElementById('departmentSelect');
  if (departmentSelect) {
    departmentSelect.addEventListener('change', function() {
      // Reset doctor selection when department changes
      const doctorInputs = document.querySelectorAll('input[name="doctorSelect"]');
      doctorInputs.forEach(input => input.checked = false);
      
      // Here you would typically update the available doctors based on department
      console.log('Department selected: ' + this.value);
    });
  }

  // Patient type toggle
  const existingPatient = document.getElementById('existingPatient');
  const newPatient = document.getElementById('newPatient');
  const existingPatientForm = document.getElementById('existingPatientForm');
  const newPatientForm = document.getElementById('newPatientForm');

  if (existingPatient && newPatient) {
    existingPatient.addEventListener('change', function() {
      if (this.checked) {
        existingPatientForm.style.display = 'block';
        newPatientForm.style.display = 'none';
      }
    });

    newPatient.addEventListener('change', function() {
      if (this.checked) {
        existingPatientForm.style.display = 'none';
        newPatientForm.style.display = 'block';
      }
    });
  }
});

function showEditModal(appointmentId, date, time, reason, notes, status) {
    const form = document.getElementById('editAppointmentForm');
    form.action = `/appointment/${appointmentId}/update`;
    
    document.getElementById('editAppointmentId').value = appointmentId;
    document.getElementById('editAppointmentDate').value = date;
    document.getElementById('editAppointmentTime').value = time;
    document.getElementById('editAppointmentReason').value = reason;
    document.getElementById('editAppointmentNotes').value = notes;
    document.getElementById('editStatus').value = status;
    
    new bootstrap.Modal(document.getElementById('editAppointmentModal')).show();
}

function showCancelModal(appointmentId) {
    const form = document.getElementById('cancelAppointmentForm');
    form.action = `/appointment/cancel`;
    document.getElementById('cancelAppointmentId').value = appointmentId;
    
    new bootstrap.Modal(document.getElementById('cancelAppointmentModal')).show();
}