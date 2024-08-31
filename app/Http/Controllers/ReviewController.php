<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showReview(Request $request, $id)
    {
        $booking_id = Booking::findOrFail($id);
        $service_provider_id = Booking::where('id', $id)->first()->service_provider_id;
        //Check if the user already reviewed the service provider and booking status is Completed
        if (review::where('user_id', auth()->user()->id)->where('service_provider_id', $service_provider_id)->where('booking_id', $id)->exists()) {
            return redirect('dashboard')->with('flash.bannerStyle', 'danger')->with('flash.banner', 'You have already reviewed this service provider');
        }
        if (Booking::where('id', $id)->where('status', 'Completed')->doesntExist()) {
            return redirect('dashboard')->with('flash.bannerStyle', 'danger')->with('flash.banner', 'You can only review a service provider after the booking is completed');
        }
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
        return redirect('dashboard')->with('flash.bannerStyle', 'success')->with('flash.banner', 'Review submitted successfully');
    }
    public function show()
    {
        $review = review::all();
        return view('review-page', compact('review'));
    }
}
