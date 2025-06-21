<header class="fbs__net-navbar navbar navbar-expand-lg dark bg-light fixed-top"
        aria-label="freebootstrap.net navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="navbar-brand w-auto" href="">
                <img class="logo dark img-fluid" src="{{ asset('') }}assetsBackend/images/logo-landscape.png" alt="Tarobill Logo">
                <img class="logo light img-fluid" src="{{ asset('') }}assetsBackend/images/logo-landscape.png" alt="Tarobill Logo">
            </a>
            <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                aria-labelledby="fbs__net-navbarsLabel">
                <div class="offcanvas-header">
                    <div class="offcanvas-header-logo">
                        <a class="logo-link" id="fbs__net-navbarsLabel" href="{{ url('/') }}">
                            <img class="logo dark img-fluid" src="{{ asset('') }}assets/images/logo-dark.svg" alt="Tarobill Logo">
                            <img class="logo light img-fluid" src="{{ asset('') }}assets/images/logo-light.svg" alt="Tarobill Logo">
                        </a>
                    </div>
                    <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body align-items-lg-center">
                    <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('user/tagihan') ? 'active' : '' }}" href="{{ url('user/tagihan') }}">Tagihan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('user/riwayat') ? 'active' : '' }}" href="{{ url('user/riwayat') }}">Riwayat</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ms-auto w-auto">
        <div class="header-social d-flex align-items-center gap-1">
            <button class="btn btn-outline-danger py-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Logout
            </button>
        </div>
    </div>
</header>
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 15vh !important;">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin logout?
      </div>
      <div class="modal-footer" style="border-top: none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">
          Logout
        </button>
      </div>
    </div>
  </div>
</div>