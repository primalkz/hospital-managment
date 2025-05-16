<!-- Header -->
  <header class="header" id="header">
    <button class="toggle-sidebar" id="toggleSidebar">
      <i class="bi bi-list"></i>
    </button>
    <div class="d-flex justify-content-center flex-grow-1 mx-4">
      <form class="search-form-dash">
        <div class="position-relative">
          <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
          <input type="search" class="form-control ps-5" placeholder="Search">
        </div>
      </form>
    </div>
    <div class="header-right">
      <div class="notification-bell">
        <i class="bi bi-bell"></i>
        <span class="notification-badge">3</span>
      </div>
      <div class="user-profile dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://placehold.co/100x100?text=User" alt="User" class="user-avatar">
          <div class="user-info d-none d-md-block ms-2">
            <div class="user-name">{{ Auth::user()->name }}</div>
            <div class="user-role text-muted small">{{ ucfirst(Auth::user()->type) }}</div>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2" aria-labelledby="userDropdown">
          <li>
            <div class="dropdown-header">
              <div class="d-flex align-items-center">
                <img src="https://placehold.co/100x100?text=User" alt="User" class="rounded-circle me-2" width="36">
                <div>
                  <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                  <small class="text-muted">{{ Auth::user()->email }}</small>
                </div>
              </div>
            </div>
          </li>
          <li><hr class="dropdown-divider"></li>          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
              <i class="bi bi-person me-2"></i> My Profile
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
              <i class="bi bi-gear me-2"></i> Settings
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout.user') }}">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>