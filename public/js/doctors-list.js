document.addEventListener('DOMContentLoaded', function() {
    function showAlert(message, type = 'success') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} rounded-3 shadow-md alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        const container = document.querySelector('.container-fluid');
        container.insertBefore(alertDiv, container.firstChild);
        
        // Auto-hide after 3 seconds
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alertDiv);
            bsAlert.close();
        }, 3000);
    }  
    // Delete buttons
    const deleteButtons = document.querySelectorAll('.delete-doctor');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const doctorId = this.getAttribute('data-doctor-id');
            const deleteForm = document.getElementById('deleteDoctorForm');
            const action = deleteForm.getAttribute('action');
            deleteForm.action = action.replace(':id', doctorId);
            
            // Show the modal
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            deleteModal.show();
        });
    });

    // Handle form submission for delete
    const deleteForm = document.getElementById('deleteDoctorForm');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const modal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
                modal.hide();
                window.location.reload();
            })
            .catch(error => {
                console.error('Error deleting doctor:', error);
                alert('Failed to delete doctor. Please try again.');
            });
        });
    }

    // Search functionality
    const searchInput = document.querySelector('.search-container input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const doctorRows = document.querySelectorAll('.doctors-table tbody tr');
            
            doctorRows.forEach(row => {
                const doctorName = row.querySelector('h6').textContent.toLowerCase();
                const doctorEmail = row.querySelector('p').textContent.toLowerCase();
                
                if (doctorName.includes(searchTerm) || doctorEmail.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

    // Email verification toggles
    const emailSwitches = document.querySelectorAll('[id^="emailSwitch"]');
    emailSwitches.forEach(switchEl => {
        switchEl.addEventListener('change', function() {
            const doctorId = this.id.replace('emailSwitch', '');
            const isVerified = this.checked;
            // TODO: Add AJAX call to update verification status
        });
    });

    // Edit doctor functionality
    const editButtons = document.querySelectorAll('.edit-doctor');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const doctorId = this.getAttribute('data-doctor-id');
            
            fetch(`/admin/doctors/${doctorId}`)
                .then(response => response.json())
                .then(doctor => {
                    const form = document.getElementById('editDoctorForm');
                    form.action = `/admin/doctors/${doctorId}`;
                    
                    // Populate form fields
                    document.getElementById('edit_name').value = doctor.name;
                    document.getElementById('edit_email').value = doctor.email;
                    document.getElementById('edit_mobile').value = doctor.mobile;
                    document.getElementById('edit_specialty').value = doctor.specialty;
                    document.getElementById('edit_experience_years').value = doctor.experience_years;
                    document.getElementById('edit_address').value = doctor.address;
                    document.getElementById('edit_city').value = doctor.city;
                    document.getElementById('edit_zip_code').value = doctor.zip_code;
                    document.getElementById('edit_bio').value = doctor.bio || '';
                    document.getElementById('edit_status').checked = doctor.status === 1;
                    
                    if (doctor.profile_image) {
                        const currentImage = document.getElementById('current_image');
                        currentImage.innerHTML = `<img src="/storage/${doctor.profile_image}" alt="Current profile image" class="img-thumbnail" style="max-width: 100px;">`;
                    }
                    
                    const editModal = new bootstrap.Modal(document.getElementById('editDoctorModal'));
                    editModal.show();
                })
                .catch(error => {
                    console.error('Error fetching doctor details:', error);
                    alert('Failed to load doctor details. Please try again.');
                });
        });
    });

    // Handle edit form submission
    const editForm = document.getElementById('editDoctorForm');
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('_method', 'PUT');
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                window.location.reload();
            })
            .catch(error => {
                console.error('Error updating doctor:', error);
                alert('Failed to update doctor. Please try again.');
            });
        });
    }
});