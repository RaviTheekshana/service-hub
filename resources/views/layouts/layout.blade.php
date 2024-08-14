<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Service Hub</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('images/favicon.ico')}}" rel="icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @livewireStyles



    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <title>ServiceHub</title>
<header id="header" class="header d-flex align-items-center fixed-top mb-4">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="#" class="logo d-flex align-items-center me-auto">
            <img src="{{asset('images/logo2.jpg')}}" alt="">
            <h1 class="sitename">Service Hub</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                <li class="dropdown"><a href="{{ url('/bookings/our-service') }}"><span>Our Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Electrician</a></li>
                        {{--<ul> <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>--}}
                        <li><a href="#">Plumber</a></li>
                        <li><a href="#">Gardner</a></li>
                        <li><a href="#">Welder</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/bookings/create') }}">Booking</a></li>
                <li><a href="{{ url('/bookings/portfolio') }}">Service Providers</a></li>
                <li><a href="{{ url('/bookings/review') }}">Reviews</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @auth
            <a class="btn-getstarted" href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
            <a class="btn-getstarted" href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</header>
    <body>
    <!-- Page Content -->
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @livewireScripts
    </body>
</html>
