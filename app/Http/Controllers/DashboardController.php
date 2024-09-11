<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\review;
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

        // Get all bookings of the authenticated user with completed status
        $book = Booking::where('user_id', $user->id)->get();

        // Get all reviewed booking IDs by the user
        $reviewedBookingIds = Review::where('user_id', $user->id)->pluck('booking_id')->toArray();

        // Get completed bookings that are not yet reviewed
        $unreviewedBookings = Booking::where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereNotIn('id', $reviewedBookingIds)
            ->get();

        // Check if there are any unreviewed bookings
        $showReviewPopup = $unreviewedBookings->isNotEmpty();

        // Pass data to the view
        $blog = Blogpost::where('user_id', $user->id)->get();
        $blogIds = $blog->pluck('id')->toArray();
        $approves = Approve::whereIn('blog_post_id', $blogIds)->get();

        return view('dashboard', compact('book', 'blog', 'approves', 'unreviewedBookings', 'showReviewPopup'));
    }

    public function bookingView()
    {
        //Get the all booking data from db to the view belongs to the authenticated Service Provider
        $book = Booking::where('service_provider_id', auth()->user()->id)->get();
        return view('Provider-Dashboard.provider-booking', compact('book'));

    }
    public function update()
    {
        if (auth()->user()->role === 'service_provider') {
            //Get the booking data from db to the view belongs to the authenticated Service Provider
            $book = Booking::where('id', request('booking'))->first();
            return view('Provider-Dashboard.bookingupdate', compact('book'));
        }
        return view('components.uservisibility');

    }
    public function review()
    {
        if (auth()->user()->role === 'service_provider') {
            $review = review::where('service_provider_id', auth()->user()->id)->get();
            return view('Provider-Dashboard.provider-review', compact('review'));
        }
        return view('components.uservisibility');

    }
}

