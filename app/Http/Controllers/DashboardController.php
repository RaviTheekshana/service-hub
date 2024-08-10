<?php

namespace App\Http\Controllers;

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
        // Redirect to Filament admin dashboard if the user is an admin
        if (!auth()->user() || auth()->user()->role === 'admin') {
            return redirect()->to('/admin');
        }
        elseif ($user && $user->role === 'service_provider') {
            return view('layouts.provider-dashboard');
        }
        // Render the normal dashboard for regular users
        return view('dashboard');
    }
}

