<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Profile_Management;
use App\Models\User;
use Illuminate\Http\Request;


class ServiceProviderController extends Controller
{
    public function showProfile(Request $request)
    {
//        $profile = Profile_Management::all();
//        return view('bookings.profile', compact('profile'));// Adjust the view path as needed
        // Fetching all profiles
        $query = Profile_Management::query();

        // Search by provider name
//        if ($request->filled('search')) {
//            $searchTerm = $request->input('search');
//            $query->whereHas('service_provider', function ($q) use ($searchTerm) {
//                $q->where('name', 'like', '%' . $searchTerm . '%');
//            });
//        }
        $searchQuery = $request->input('search');
        $query->whereHas('service_provider', function ($query) use ($searchQuery) {
            $query->where('name', 'LIKE', '%' . $searchQuery . '%');
        })->get();

        // Filter by category
        if ($request->filled('category')) {
            $category = $request->input('category');
            $query->where('category_id', $category);
        }

        // Get the filtered profiles
        $profile = $query->paginate(10); // Adjust the pagination if necessary

        // Fetch all categories for the filter dropdown
        $categories = Category::all();

        return view('bookings.profile', compact('profile', 'categories'));
    }
    public function getUsersByCategory($category_id)
    {
        // Fetch users based on the selected category
        $users = User::where('category_id', $category_id)->get(['id', 'name']);

        // Return the users as a JSON response
        return response()->json($users);
    }

}
