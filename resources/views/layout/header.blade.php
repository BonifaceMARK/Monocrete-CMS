<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #147327; color: #ffffff;">
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" style="color:#ffffff;" class="logo d-flex align-items-center">
      <img style="color: #304696; filter: drop-shadow(2px 2px 4px rgba(255, 255, 255, 255));" src="{{asset('assets/img/mono_logo.png')}}" alt="">
      <span style="font-size: 14px; color:#ffffff;" class="d-none d-lg-block" >Signages Management System</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn" style="color: #ffffff;"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" style="color: #ffffff;">
          <i class="bi bi-person-fill"></i> Profile
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            {{-- <h6>{{ auth()->user()->email }}</h6>
            <span>{{ auth()->user()->department }}</span> --}}
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{url('/logout')}}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->
