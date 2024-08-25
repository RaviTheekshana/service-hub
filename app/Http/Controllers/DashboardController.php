<?php

namespace App\Http\Controllers;

use App\Models\approve;
use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\Profile_Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\get;


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
        //Pass the Blogpost data to the view
        $blog = Blogpost::where('user_id', auth()->user()->id)->get();
        $blogIds = $blog->pluck('id')->toArray();
        $approves = Approve::whereIn('blog_post_id', $blogIds)->get();
        return view('dashboard', compact('blog', 'approves'));
    }
    public function bookingView()
    {
        //Get the all booking data from db to the view belongs to the authenticated Service Provider
        $book = Booking::where('service_provider_id', auth()->user()->id)->get();
        return view('Provider-Dashboard.provider-booking', compact('book'));

    }
    public function update()
    {
        //Get the booking data from db to the view belongs to the authenticated Service Provider
        $book = Booking::where('id' , request('booking'))->first();
        return view('Provider-Dashboard.bookingupdate', compact('book'));

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

