@extends('layout.title')

@section('title', 'Login')
@include('layout.title')

<body>
 
    
  <main class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">

          <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="row g-0">

              <!-- Left Side (Optional Image) -->
              <div class="col-md-6 d-none d-md-block bg-white text-blue d-flex align-items-center justify-content-center p-4">
                <div class="text-center">
                  <img src="{{ asset('assets/img/mono_logo.png') }}" alt="Monocrete" class="img-fluid mb-3" style="max-height: 150px;">
                  <h2 class="h4">Signage Management System</h2>
                  <p class="small">Manage your Video Needs.</p>
                </div>
              </div>

              <!-- Right Side (Login Form) -->
              <div style="font-size: 10px;" class="col-md-6 p-5 bg-white">

                <div class="text-center mb-4">
                  <h5 class="fw-bold">Login</h5>
                  <p class="text-muted small mb-0">Enter Credentials to Login.</p>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif

                <!-- Error Message -->
                @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                      {{ $error }}
                    @endforeach
                  </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                  @csrf

                  <div class="mb-3">
                    <label for="yourEmail" class="form-label">Username</label>
                    <div class="input-group">
                      <span style="font-size: 10px;" class="input-group-text"><i class="bi bi-person"></i></span>
                      <input style="font-size: 10px;" type="username" name="username" id="username" class="form-control" placeholder="Enter your Username" required>
                      <div class="invalid-feedback">Please enter your Username.</div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="input-group">
                      <input style="font-size: 10px;" type="password" name="password" id="yourPassword" class="form-control" placeholder="Enter your password" required>
                      <button style="font-size: 10px;" type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    <div class="invalid-feedback">Please enter your password.</div>
                  </div>

                  <div class="mb-3 form-check">
                    {{-- <input type="checkbox" class="form-check-input" name="remember" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label> --}}
                  </div>

                  <div class="d-grid mb-3">
                    <button style="font-size: 10px;" type="submit" class="btn btn-primary">Login</button>
                  </div>

                  <div class="text-center">
                    {{-- <p class="small mb-0">Don't have an account? <a href="{{ url('/register') }}">Sign up here</a></p> --}}
                  </div>

                </form>

              </div> <!-- End Right Side -->

            </div>
          </div>

        </div>
      </div>
    </div>

  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('yourPassword');

      togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.innerHTML = type === 'password' 
          ? '<i class="bi bi-eye"></i>' 
          : '<i class="bi bi-eye-slash"></i>';
      });
    });
  </script>

</body>
