<!-- Edit Doctor Modal -->
<div class="modal fade" id="editDoctorModal" tabindex="-1" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="editDoctorModalLabel">Edit Doctor</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">          
        <form id="editDoctorForm" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row g-3">
            <div class="col-md-6">
              <label for="edit_name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="edit_name" name="name" required>
            </div>
            <div class="col-md-6">
              <label for="edit_email" class="form-label">Email</label>
              <input type="email" class="form-control" id="edit_email" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="edit_mobile" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="edit_mobile" name="mobile" required>
            </div>
            <div class="col-md-6">
              <label for="edit_specialty" class="form-label">Specialty</label>
              <select class="form-select" id="edit_specialty" name="specialty" required>
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
              <label for="edit_experience_years" class="form-label">Years of Experience</label>
              <input type="number" class="form-control" id="edit_experience_years" name="experience_years" min="0" required>
            </div>
            <div class="col-12">
              <label for="edit_address" class="form-label">Address</label>
              <input type="text" class="form-control" id="edit_address" name="address" required>
            </div>
            <div class="col-md-6">
              <label for="edit_city" class="form-label">City</label>
              <input type="text" class="form-control" id="edit_city" name="city" required>
            </div>
            <div class="col-md-6">
              <label for="edit_zip_code" class="form-label">Zip Code</label>
              <input type="text" class="form-control" id="edit_zip_code" name="zip_code" required>
            </div>
            <div class="col-12">
              <label for="edit_bio" class="form-label">Biography</label>
              <textarea class="form-control" id="edit_bio" name="bio" rows="3"></textarea>
            </div>
            <div class="col-md-6">
              <label for="edit_profile_image" class="form-label">Profile Image</label>
              <input type="file" class="form-control" id="edit_profile_image" name="profile_image">
              <div id="current_image" class="mt-2"></div>
            </div>
            <div class="col-md-6">
              <label for="edit_status" class="form-label">Status</label>
              <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" role="switch" id="edit_status" name="status" value="1">
                <label class="form-check-label" for="edit_status">Active</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary px-4">
              <i class="bi bi-check-lg me-2"></i> Update Doctor
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
