<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Taro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assetsBackend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetsBackend/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assetsBackend/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    @stack('css')
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <!-- Topbar Start -->
    @include('layouts.navbar-layout')
    <!-- end Topbar -->
    
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.left-sidebar')
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        @yield('breadcrumb')
                                    </ol>
                                </div>
                                <h4 class="page-title">Page</h4>

                                @yield('content')
                            </div>
                        </div>
                    </div>     
                    <!-- end page title --> 
                    
                </div> <!-- End Content -->

                <!-- Footer Start -->
                @include('layouts.footer-layout')
                <!-- end Footer -->

            </div> <!-- content-page -->
        </div> <!-- end wrapper-->
    </div>
    <!-- END Container -->

    {{-- @include('layouts.right-sidebar') --}}
    <div class="rightbar-overlay"></div>

    <!-- bundle -->
    <script src="{{ asset('assetsBackend/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assetsBackend/js/app.min.js') }}"></script>

    @stack('js')
</body>
</html>
