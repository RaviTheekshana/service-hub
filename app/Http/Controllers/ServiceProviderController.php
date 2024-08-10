<?php

namespace App\Http\Controllers;

class ServiceProviderController extends Controller
{
    public function showProfile()
    {
        // You can retrieve data from the database or other sources if needed
        // For example:
        // $serviceProviders = ServiceProvider::all();

        return view('bookings.profile'); // Adjust the view path as needed
    }
}
