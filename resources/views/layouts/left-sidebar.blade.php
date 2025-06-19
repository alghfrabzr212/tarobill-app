<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="{{ asset('assetsBackend/images/users/avatar-1.png') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">Admin Taro</span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
            <i class="uil-home-alt"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Apps</li>

        <li class="side-nav-item">
            <a href="{{ route('admin.accounts.index') }}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
                <span> Accounts Manager </span>
            </a>
        </li>

    </ul>
    <!-- end side-nav -->

    <div class="clearfix"></div>

</div>
