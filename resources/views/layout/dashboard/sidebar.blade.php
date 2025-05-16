<!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      @php
          $segments = explode('/', URL::current());
          $route = $segments[count($segments)-1];
          // dd($segments[count($segments)-1]); // Dumps and stops execution to inspect the array
      @endphp      
      <img src="https://placehold.co/80x80?text=CarePoint" alt="CarePoint Logo">
      <span class="brand-text">CarePoint</span>
    </div>
    <div class="sidebar-menu">
      <div class="sidebar-item">
        <a href="{{ route('dashboard') }}" class="sidebar-link {{ $route == 'dashboard' ? 'active' : '' }} ">
          <span class="sidebar-icon"><i class="bi bi-grid-1x2-fill"></i></span>
          <span class="sidebar-text">Dashboard</span>
        </a>
      </div>

      @if(Auth::user()->type != 'patient' )
      <div class="sidebar-item">
        <a href="" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-people-fill"></i></span>
          <span class="sidebar-text">Patients</span>
        </a>
      </div>
      @endif

      @if(Auth::user()->type != 'doctor' || Auth::user()->type != 'patient' )
      <div class="sidebar-item">
        <a href="{{ route('admin.doctors-list') }}" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-clipboard2-pulse-fill"></i></span>
          <span class="sidebar-text">Doctors</span>
        </a>
      </div>
      @endif

      <div class="sidebar-item">
        <a href="{{ route('dashboard.appointment') }}" class="sidebar-link {{ $route == 'appointment' ? 'active' : '' }}">
          <span class="sidebar-icon"><i class="bi bi-calendar-check-fill"></i></span>
          <span class="sidebar-text">Appointment</span>
        </a>
      </div>
      <div class="sidebar-item">
        <a href="#" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-door-open-fill"></i></span>
          <span class="sidebar-text">Bedroom</span>
        </a>
      </div>
      <div class="sidebar-item">
        <a href="#" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-file-earmark-medical-fill"></i></span>
          <span class="sidebar-text">Lab Reports</span>
        </a>
      </div>
      <div class="sidebar-item">
        <a href="#" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-cash-stack"></i></span>
          <span class="sidebar-text">Transaction</span>
        </a>
      </div>
      @if(Auth::user()->type == 'admin' )
      <div class="sidebar-item">
        <a href="#" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-person-plus-fill"></i></span>
          <span class="sidebar-text">Add Admin</span>
        </a>
      </div>
      @endif
      <div class="sidebar-item">
        <a href="#" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-gear-fill"></i></span>
          <span class="sidebar-text">Settings</span>
        </a>
      </div>
      <div class="sidebar-item mt-auto">
        <a href="{{ route('logout.user') }}" class="sidebar-link">
          <span class="sidebar-icon"><i class="bi bi-box-arrow-left"></i></span>
          <span class="sidebar-text">Log out</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Mobile Overlay -->
  <div class="mobile-overlay" id="mobileOverlay"></div>