<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\BlogPost;
use App\Models\Booking;
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
        //Get the all booking data from db to the view belongs to the authenticated Service Provider
        $book = Booking::where('user_id', auth()->user()->id)->get();
        //Pass the Blogpost data to the view
        $blog = Blogpost::where('user_id', auth()->user()->id)->get();
        $blogIds = $blog->pluck('id')->toArray();
        $approves = Approve::whereIn('blog_post_id', $blogIds)->get();
        return view('dashboard', compact('book','blog', 'approves'));
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
}

