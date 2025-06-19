<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="index.html" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('assetsBackend/images/logo-light.png') }}" alt="" height="16">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('assetsBackend/images/logo_sm.png') }}" alt="" height="16">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="{{ asset('assetsBackend/images/users/avatar-1.png') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">Admin</span>
                        <span class="account-position">Administrator</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
    <i class="mdi mdi-account-circle me-1"></i>
    <span>My Account</span>
</a>


                    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="dropdown-item notify-item d-flex align-items-center border-0 bg-transparent w-100">
        <i class="mdi mdi-logout me-1"></i>
        <span>Logout</span>
    </button>
</form>

</form>

                </div>
            </li>

        </ul>

        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>

        <div class="app-search dropdown"></div>

    </div>
</div>
