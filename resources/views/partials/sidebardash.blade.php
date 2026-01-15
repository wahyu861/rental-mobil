<!-- partial:partials/sidebar.blade.php -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('back/assets/images/faces/face1.jpg') }}" alt="profile" />
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>

        <!-- Menu Dashboard -->
        @auth
            {{-- Dashboard --}}
            @can('view dashboard')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
            @endcan

            {{-- USER --}}
            @role('user')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('bookings') ? 'active' : '' }}" href="{{ route('bookings') }}">
                        <span class="menu-title">My Booking</span>
                        <i class="mdi mdi-car menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="menu-title">Update Profile</span>
                        <i class="mdi mdi-account-edit menu-icon"></i>
                    </a>
                </li>
            @endrole

            {{-- ADMIN --}}
            @role('admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.bookings*') ? 'active' : '' }}"
                        data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-c">
                        <span class="menu-title">Reservasi</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-television-guide menu-icon"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard.bookings') ? 'active' : '' }}"
                                    href="{{ route('bookings') }}">All Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/requests*') ? 'active' : '' }}"
                                    href="{{ route('requests') }}">All Request</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endrole
        @endauth

        <!-- Menu Lainnya -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('cars.index') ? 'active' : '' }}" href="{{ route('cars.index') }}">
                <span class="menu-title">Cars Managements</span>
                <i class="mdi mdi-car-connected menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}"
                href="{{ route('category.index') }}">
                <span class="menu-title">Category Managements</span>
                <i class="mdi mdi-car-connected menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('about_us.index') ? 'active' : '' }}"
                href="{{ route('about_us.index') }}">
                <span class="menu-title">About Us</span>
                <i class="mdi mdi-car-connected menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/blogs*') ? 'active' : '' }}"
                href="{{ url('dashboard/blogs') }}">
                <span class="menu-title">Blogs</span>
                <i class="mdi mdi-book-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/settings*') ? 'active' : '' }}" data-bs-toggle="collapse"
                href="#ui-basic" aria-expanded="false" aria-c>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-television-guide menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('hero.index') ? 'active' : '' }}"
                            href="{{ route('hero.index') }}">Hero Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('abouts.index') ? 'active' : '' }}"
                            href="{{ route('abouts.index') }}">About Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('edit.profile') ? 'active' : '' }}"
                            href="{{ route('edit.profile') }}">
                            <span class="menu-title">Update Profile</span>
                            <i class="mdi mdi-account-edit menu-icon"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-feedback" aria-expanded="false" aria-c>
                <span class="menu-title">Feedback</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-comment-alert menu-icon"></i>
            </a>
            <div class="collapse" id="ui-feedback">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comments</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
