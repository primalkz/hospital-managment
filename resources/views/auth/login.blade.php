<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Medical Hospital Dashboard</title>
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
              <h2 class="fw-bold">Welcome Back</h2>
              <p class="text-secondary">Sign in to access your dashboard</p>
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

              @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>  
              @endif

              <form method="post" action="{{ route('login.user') }}">
                @csrf
                <div class="mb-4">
                  <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="emailInput" placeholder="name@example.com">
                    <label for="emailInput">Email address</label>
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
                <div class="d-flex justify-content-between mb-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                      Remember me
                    </label>
                  </div>
                  <a href="#" class="text-primary text-decoration-none">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 mb-4">Sign In</button>
                
                <div class="divider">
                  <span>Or continue with</span>
                </div>
                
                <div class="row g-3 mb-4">
                  <div class="col-6">
                    <a href="#" class="social-login-btn w-100">
                      <svg width="20" height="20" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        <path d="M1 1h22v22H1z" fill="none"/>
                      </svg>
                      Google
                    </a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="social-login-btn w-100">
                      <i class="bi bi-facebook text-primary"></i>
                      Facebook
                    </a>
                  </div>
                </div>
                
                <p class="text-center mb-0">
                  Don't have an account? <a href="#" class="text-primary fw-medium">Sign up</a>
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