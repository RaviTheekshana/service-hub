<?php

namespace App\Http\Controllers;
use App\Models\Profile_Management;
use App\Models\User;


class ServiceProviderController extends Controller
{
    public function showProfile()
    {
        $profile = Profile_Management::all();
        return view('bookings.profile', compact('profile'));// Adjust the view path as needed
    }
    public function getUsersByCategory($category_id)
    {
        // Fetch users based on the selected category
        $users = User::where('category_id', $category_id)->get(['id', 'name']);

        // Return the users as a JSON response
        return response()->json($users);
    }

}
