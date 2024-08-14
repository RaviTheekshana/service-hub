<?php

namespace App\Http\Controllers;

use App\Models\Profile_Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = Auth::user();
        \Log::info('User logged in:', ['user_id' => $user->id, 'role' => $user->role]);
        if (!auth()->user() || auth()->user()->role === 'service_provider') {
            return view('layouts.provider-dashboard');
        }
        // Render the normal dashboard for regular users
        return view('dashboard');
    }
//    public function show()
//    {
//        // Get the authenticated user
//        $user = auth()->user();
//        // Fetch or create the service provider profile data
//        $profile = Profile_Management::where('service_provider_id', $user->id)->first();
//        return view('layouts.provider-dashboard')->with('profile', $profile);
//    }
}

