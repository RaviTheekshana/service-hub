<?php

namespace App\Http\Controllers;
use App\Models\User;


class ServiceProviderController extends Controller
{
    public function showProfile()
    {
        // You can retrieve data from the database or other sources if needed
        // For example:
        // $serviceProviders = ServiceProvider::all();

        return view('bookings.profile'); // Adjust the view path as needed
    }
    public function getUsersByCategory($category_id)
    {
        // Fetch users based on the selected category
        $users = User::where('category_id', $category_id)->get(['id', 'name']);

        // Return the users as a JSON response
        return response()->json($users);
    }

}
