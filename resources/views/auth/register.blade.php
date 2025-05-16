<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Medical Hospital Dashboard</title>
  {{-- app scripts --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- Custom CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>

<body>
  <header class="container py-3">
    <a href="/" class="text-decoration-none text-primary d-flex align-items-center">
      <i class="bi bi-arrow-left me-2"></i> Back to Home
    </a>
  </header>

  <main class="flex-grow-1 d-flex align-items-center py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card login-card border-0">
            <div class="login-header">
              <div class="login-logo">
                <i class="bi bi-plus-lg"></i>
              </div>
              <h2 class="fw-bold">Register Yourself</h2>
              <p class="text-secondary">Sign up to unlock your access to dashboard</p>
            </div>
            <div class="card-body p-4 p-md-5 pt-0">
              
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form method="post" action="{{ route('register.user') }}">
                @csrf
                <div class="mb-4">
                  <div class="form-floating">
                    <input name="name" type="text" class="form-control" id="nameInput" placeholder="Name">
                    <label for="emailInput">Your full name</label>
                  </div>
                </div>

                <div class="mb-4">
                  <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="emailInput" placeholder="name@example.com">
                    <label for="emailInput">Email address</label>
                  </div>
                </div>

                <!-- Select Doctor or Patient -->
                <div class="mb-4">
                  <div class="form-floating">
                    <select name="type" class="form-select" id="roleSelect">
                      <option value="doctor">Doctor</option>
                      <option value="patient">Patient</option>
                    </select>
                    <label for="roleSelect">Select Role</label>
                  </div>
                </div>

                <div class="mb-4 position-relative">
                  <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">
                    <label for="passwordInput">Password</label>
                  </div>
                  <button type="button" class="password-toggle-btn" id="togglePassword">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                
                <div class="mb-4 position-relative">
                  <div class="form-floating">
                    <input name="password_confirmation" type="password" class="form-control" id="passwordInput" placeholder="Confirm Password">
                    <label for="passwordInput">Confirm Password</label>
                  </div>
                  <button type="button" class="password-toggle-btn" id="togglePassword">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              
                <button type="submit" class="btn btn-primary w-100 py-2 mb-4">Sign In</button>
                
                <p class="text-center mb-0">
                  Already have an account? <a href="#" class="text-primary fw-medium">Sign In</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="container py-3 text-center text-secondary">
    <p class="small mb-0">© 2025 Medical Hospital. All rights reserved.</p>
  </footer>

  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Password Toggle Script -->
  <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('passwordInput');
      const icon = this.querySelector('i');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    });
  </script>
</body>
</html>