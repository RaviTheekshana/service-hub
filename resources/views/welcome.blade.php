<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ServiceHub</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub - Home</title>
    <style>
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s, transform 0.5s;
        }

        .fade-in-up.appear {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('images/logo2.jpg')}}" width="80px">
                    </a>
                    <!-- Navigation Links -->
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Home</a>
                    <a href="{{ url('/our-service') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Our Service</a>
                    <a href="{{ url('/bookings/create') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Booking</a>
                    <a href="{{ url('/service-providers') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Service Providers</a>
                    <a href="{{ url('/reviews') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Reviews</a>
                    <a href="{{ url('/about-us') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">About Us</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Hero Section -->
<section class="hero bg-cover bg-center h-96 text-white" style="background-image: url('{{ asset('images/bg.jpg') }}');">
    <div class="container mx-auto h-full flex items-center justify-center">
        <div class="text-center bg-gray-800 bg-opacity-75 p-6 rounded-lg">
            <h2 class="text-5xl font-bold mb-4">Welcome to ServiceHub</h2>
            <p class="text-lg mb-8">Your one-stop platform for verified service providers</p>
            <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Get Started</a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-12 p-3">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold text-center mb-8">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="service-box bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="{{asset('images/Electrician.jpg')}}" alt="Electrician" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Electrician</h3>
                <p>Reliable and certified electricians for all your electrical needs.</p>
            </div>
            <div class="service-box bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="{{asset('images/Plumber.jpg')}}" alt="Plumber" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Plumber</h3>
                <p>Expert plumbers for installations, repairs, and maintenance.</p>
            </div>
            <div class="service-box bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="{{asset('images/gardener.jpg')}}" alt="Gardener" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Gardener</h3>
                <p>Professional gardeners to keep your garden lush and beautiful.</p>
            </div>
            <div class="service-box bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="{{asset('images/welder.jpg')}}" alt="Welder" class="w-full h-32 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Welder</h3>
                <p>Skilled welders for all types of welding projects.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="bg-gray-200 py-12">
    <div class="container mx-auto">
        <h2 class="text-5xl font-bold text-center mb-8">About Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex items-center">
                <img src="{{asset('images/servicehub.jpg')}}" alt="About Us" class="w-75 h-75 ml-40 object-cover rounded-lg">
            </div>
            <div class="flex flex-col justify-center pr-5">
                <p class="text-lg mb-4">ServiceHub is a centralized, verified platform that connects business customers with trusted service providers like electricians, plumbers, gardeners, and welders. Our mission is to simplify the process of finding and hiring reliable professionals for all your service needs.</p>
                <p class="text-lg mb-4">We understand the challenges of a fragmented service landscape and strive to bring together skilled professionals and customers in one place, ensuring transparency, trust, and efficiency.</p>
                <a href="{{ url('/about-us') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 ServiceHub. All rights reserved.</p>
        <p>Contact us: info@servicehub.com | +94123456789</p>
    </div>
</footer>
</body>
</html>
