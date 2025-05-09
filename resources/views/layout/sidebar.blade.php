<aside id="sidebar" class="sidebar" style="background-color: #147327; color: #4e45b1; height: 100vh;">

  <ul class="sidebar-nav" style="list-style: none; padding: 0; margin: 0;">

    <li class="nav-item">
    <a class="nav-link collapsed" onclick="document.getElementById('iframeContent').src='{{route('tv.index')}}'" style="color: #371175; text-decoration: none; padding: 10px; display: block;">
      <i class="bi bi-tv-fill" style="color: #108229;"></i>  <span style="font-size: 10px;">Manage | TV</span>
    </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
    <a class="nav-link collapsed" onclick="document.getElementById('iframeContent').src='{{route('signage.index')}}'" style="color:  #108229; text-decoration: none; padding: 10px; display: block;">
      <i class="bi bi-signpost-2-fill" style="color:  #108229;"></i>  <span style="font-size: 10px;">Manage | Signage</span>
    </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
    <a class="nav-link collapsed" onclick="document.getElementById('iframeContent').src='{{route('user.index')}}'" style="color:  #108229; text-decoration: none; padding: 10px; display: block;">
      <i class="bi bi-person-lines-fill" style="color:  #108229;"></i>  <span style="font-size: 10px;">Manage | User</span>
    </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
    <a class="nav-link collapsed" onclick="document.getElementById('iframeContent').src='{{route('monitor.tv')}}'" style="color:  #108229; text-decoration: none; padding: 10px; display: block;">
      <i class="bi bi-border-all" style="color:  #108229;"></i><span style="font-size: 10px;">Monitor | TV</span>
    </a>
    </li><!-- End Components Nav -->

  </ul>

</aside><!-- End Sidebar -->
