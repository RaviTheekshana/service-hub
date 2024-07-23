<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ServiceHub</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="flex justify-between items-center bg-gray-100 p-4">
    <div class="text-gray-700 font-bold text-xl">
        ServiceHub
    </div>
    <div class="flex">
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
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 font-medium mx-4">Register</a>
            @endif
        @endauth
    </div>
        </div>
</body>
</html>
