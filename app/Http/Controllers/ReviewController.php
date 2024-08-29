<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showReview()
    {
        if(!Booking::where('user_id', auth()->user()->id)->where('status', 'Completed')->exists()){
            return redirect('dashboard')->with('flash.bannerStyle', 'danger')->with('flash.banner', 'You have no completed bookings to review');
        }
        $booking_id = Booking::where('user_id', auth()->user()->id)->where('status', 'Completed')->first()->id;
        $service_provider_id = Booking::where('id', $booking_id)->first()->service_provider_id;
        return view('bookings.review', compact('booking_id', 'service_provider_id'));
    }
    public function store(Request $request)
    {
// Validate the request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_provider_id' => 'required|exists:users,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

// Create a new feedback
        review::create([
            'user_id' => auth()->user()->id,
            'service_provider_id' => $validated['service_provider_id'],
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

// Redirect back with a success message
        return redirect()->back()->with('flash.bannerStyle', 'success')->with('flash.banner', 'Review submitted successfully');
    }
}
