<!-- Edit Appointment Modal -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      <form id="editAppointmentForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <input type="hidden" id="editAppointmentId" name="appointment_id">
          
          <div class="mb-3">
            <label for="editAppointmentDate" class="form-label">Appointment Date</label>
            <input type="date" class="form-control" id="editAppointmentDate" name="appointment_date" required>
          </div>

          <div class="mb-3">
            <label for="editAppointmentTime" class="form-label">Appointment Time</label>
            <select class="form-select" id="editAppointmentTime" name="appointment_time" required>
              <option value="09:00">09:00 AM</option>
              <option value="09:30">09:30 AM</option>
              <option value="10:00">10:00 AM</option>
              <option value="10:30">10:30 AM</option>
              <option value="11:00">11:00 AM</option>
              <option value="11:30">11:30 AM</option>
              <option value="14:00">02:00 PM</option>
              <option value="14:30">02:30 PM</option>
              <option value="15:00">03:00 PM</option>
              <option value="15:30">03:30 PM</option>
              <option value="16:00">04:00 PM</option>
              <option value="16:30">04:30 PM</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="editStatus" class="form-label">Status</label>
            <select class="form-select" id="editStatus" name="status" required>
              <option value="pending">Pending</option>
              <option value="confirmed">Confirmed</option>
              <option value="completed">Completed</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="editAppointmentReason" class="form-label">Reason</label>
            <select class="form-select" id="editAppointmentReason" name="reason" required>
              <option value="regular_checkup">Regular Check-up</option>
              <option value="follow_up">Follow-up Visit</option>
              <option value="new_symptoms">New Symptoms</option>
              <option value="prescription_renewal">Prescription Renewal</option>
              <option value="test_results_review">Test Results Review</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="editAppointmentNotes" class="form-label">Additional Notes</label>
            <textarea class="form-control" id="editAppointmentNotes" name="notes" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>