document.addEventListener('DOMContentLoaded', function() {
    const departmentSelect = document.getElementById('departmentSelect');
    const doctorCards = document.querySelectorAll('.doctor-card-wrapper');
    const doctorInputs = document.querySelectorAll('input[name="doctor_id"]');
    const nextToStep3Button = document.getElementById('nextToStep3');
    
    // Function to check if a doctor is selected
    function isDoctorSelected() {
        return Array.from(doctorInputs).some(input => input.checked);
    }
    
    // Handler for doctor selection
    doctorInputs.forEach(input => {
        input.addEventListener('change', function() {
            if (this.checked) {
                // Remove error messages if they exist
                const errorMessage = document.querySelector('.doctor-selection-error');
                if (errorMessage) {
                    errorMessage.remove();
                }
            }
        });
    });
    
    // Next button click handler
    if (nextToStep3Button) {
        nextToStep3Button.addEventListener('click', function(e) {
            if (!isDoctorSelected()) {
                e.preventDefault();
                // Remove existing error message if any
                const existingError = document.querySelector('.doctor-selection-error');
                if (existingError) {
                    existingError.remove();
                }
                // Add error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger doctor-selection-error mt-2';
                errorDiv.textContent = 'Please select a doctor to continue';
                document.querySelector('.doctor-list').insertAdjacentElement('beforebegin', errorDiv);
                return false;
            }
            // Show next step if doctor is selected
            showStep(3);
        });
    }
    
    if (departmentSelect) {
        departmentSelect.addEventListener('change', function() {
            const selectedSpecialty = this.value;
            let found = false;
            
            doctorCards.forEach(card => {
                if (selectedSpecialty === '' || card.dataset.specialty === selectedSpecialty) {
                    card.style.display = 'block';
                    found = true;
                } else {
                    card.style.display = 'none';
                    // Uncheck radio if hidden
                    const radio = card.querySelector('input[type="radio"]');
                    if (radio.checked) {
                        radio.checked = false;
                    }
                }
            });
            
            // Show message if no doctors found for selected specialty
            const noDocMessage = document.querySelector('.no-doctors-message');
            if (!found && selectedSpecialty !== '') {
                if (!noDocMessage) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'alert alert-info no-doctors-message';
                    messageDiv.textContent = 'No doctors available for the selected department';
                    document.querySelector('.doctor-list').insertAdjacentElement('beforebegin', messageDiv);
                }
            } else if (noDocMessage) {
                noDocMessage.remove();
            }
        });
    }
    
    // Patient search functionality
    const patientSearch = document.getElementById('patientSearch');
    const patientCards = document.querySelectorAll('.patient-card');
    
    if (patientSearch) {
        patientSearch.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            
            patientCards.forEach(card => {
                const patientName = card.querySelector('.fw-bold').textContent.toLowerCase();
                const patientId = card.querySelector('.badge').textContent.toLowerCase();
                
                if (patientName.includes(searchValue) || patientId.includes(searchValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
