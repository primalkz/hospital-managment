// File: public/js/doctors-list.js
document.addEventListener('DOMContentLoaded', function() {
  // Toggle status switches
  const statusSwitches = document.querySelectorAll('[id^="statusSwitch"]');
  statusSwitches.forEach(switchEl => {
    switchEl.addEventListener('change', function() {
      const doctorId = this.id.replace('statusSwitch', '');
      const isActive = this.checked;
      console.log(`Doctor ID ${doctorId} status changed to ${isActive ? 'active' : 'inactive'}`);
      
      // Here you would typically make an AJAX call to update the doctor's status
      // Example:
      // updateDoctorStatus(doctorId, isActive);
    });
  });
  
  // Toggle email verification switches
  const emailSwitches = document.querySelectorAll('[id^="emailSwitch"]');
  emailSwitches.forEach(switchEl => {
    switchEl.addEventListener('change', function() {
      const doctorId = this.id.replace('emailSwitch', '');
      const isVerified = this.checked;
      console.log(`Doctor ID ${doctorId} email verification changed to ${isVerified ? 'verified' : 'unverified'}`);
      
      // Here you would typically make an AJAX call to update the doctor's email verification status
      // Example:
      // updateDoctorEmailVerification(doctorId, isVerified);
    });
  });
  
  // Impersonate buttons
  const impersonateButtons = document.querySelectorAll('.btn-primary:not([data-bs-toggle])');
  impersonateButtons.forEach(button => {
    button.addEventListener('click', function() {
      const doctorRow = this.closest('tr');
      const doctorName = doctorRow.querySelector('h6').textContent;
      console.log(`Impersonating doctor: ${doctorName}`);
      
      // Here you would typically redirect to the impersonation route
      // Example:
      // window.location.href = `/admin/impersonate/doctor/${doctorId}`;
    });
  });
  
  // Delete buttons
  const deleteButtons = document.querySelectorAll('.bi-trash');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const doctorRow = this.closest('tr');
      const doctorName = doctorRow.querySelector('h6').textContent;
      
      // Store the doctor info for the confirmation modal
      document.getElementById('deleteConfirmModal').setAttribute('data-doctor-name', doctorName);
      
      // Show the confirmation modal
      const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
      deleteModal.show();
    });
  });
  
  // Handle delete confirmation
  const confirmDeleteButton = document.querySelector('#deleteConfirmModal .btn-danger');
  if (confirmDeleteButton) {
    confirmDeleteButton.addEventListener('click', function() {
      const doctorName = document.getElementById('deleteConfirmModal').getAttribute('data-doctor-name');
      console.log(`Confirmed deletion of doctor: ${doctorName}`);
      
      // Here you would typically make an AJAX call to delete the doctor
      // Example:
      // deleteDoctorById(doctorId);
      
      // Close the modal
      const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
      deleteModal.hide();
      
      // Show success message (you could implement a toast notification here)
      alert(`Doctor ${doctorName} has been deleted successfully.`);
    });
  }
  
  // Search functionality
  const searchInput = document.querySelector('.search-container input');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      console.log(`Searching for: ${searchTerm}`);
      
      // Here you would typically implement client-side filtering or make an AJAX call
      // For demo purposes, we'll just filter the table rows
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
});