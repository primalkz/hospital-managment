<!-- Add Doctor Modal -->
  <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">          
          <form id="addDoctorForm" action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-md-6">
                <label for="mobile" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" required>
              </div>
              <div class="col-md-6">
                <label for="specialty" class="form-label">Specialty</label>
                <select class="form-select" id="specialty" name="specialty" required>
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
              </div>              <div class="col-md-6">
                <label for="experience_years" class="form-label">Years of Experience</label>
                <input type="number" class="form-control" id="experience_years" name="experience_years" min="0" required>
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
              <div class="col-12">
                <label for="bio" class="form-label">Biography</label>
                <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
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
            <div class="modal-footer mt-2">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-plus-lg me-2"></i> Add Doctor
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>