<!-- Add Patient Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addPatientModalLabel">Add New Patient</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">          
        <form id="addPatientForm" action="{{ route('admin.patients.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="mobile" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="mobile" name="mobile" required>
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="col-md-6">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="col-md-6">
              <label for="zip_code" class="form-label">Zip Code</label>
              <input type="text" class="form-control" id="zip_code" name="zip_code" required>
            </div>
            <div class="col-md-6">
              <label for="profile_image" class="form-label">Profile Image</label>
              <input type="file" class="form-control" id="profile_image" name="profile_image">
            </div>
            <div class="col-md-6">
              <label for="status" class="form-label">Status</label>
              <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" checked>
                <label class="form-check-label" for="status">Active</label>
              </div>              
            </div>
          </div>
          <div class="modal-footer mt-4">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary px-4">
              <i class="bi bi-plus-lg me-2"></i> Add Patient
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
