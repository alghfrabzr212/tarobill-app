<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Tarobill</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendors/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">
</head>

<body>
@include('layouts.user-navbar')
    <main class="container mt-5 pt-4">
    @yield('content')
</main>

    
    @include('layouts.user-footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/glightbox/glightbox.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/aos/aos.js"></script>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

</body>

</html>