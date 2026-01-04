<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-img">
            <img src="{{ asset('back/assets/images/faces/face1.jpg') }}" alt="image">
            <span class="availability-status online"></span>
        </div>
        <div class="nav-profile-text">
            <p class="mb-1 text-black">Nama User</p>
        </div>
    </a>
    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
        <div class="dropdown-divider"></div>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
            @csrf
        </form>
        <a class="dropdown-item" href="#">
            <i class="mdi mdi-logout me-2 text-primary"></i> Signout
        </a>
    </div>

</li>
