<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showReview(Request $request, $id)
    {
        $booking_id = Booking::findOrFail($id);
        $service_provider_id = Booking::where('id', $id)->first()->service_provider_id;
        //Check if the user already reviewed the service provider and booking status is Completed
        if (Review::where('user_id', auth()->user()->id)->where('service_provider_id', $service_provider_id)->where('booking_id', $id)->exists()) {
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
        Review::create([
            'user_id' => auth()->user()->id,
            'service_provider_id' => $validated['service_provider_id'],
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);
        $user = auth()->user();
        $serviceProvider = User::findOrFail($validated['service_provider_id']);
        $user->notify(new BookingNotification([
            'message' => 'You have successfully reviewed the service provider',
            'action' => route('dashboard'),
        ]));
        $serviceProvider->notify(new BookingNotification([
            'message' => 'You have received a review from ' . $user->name,
            'action' => route('provider-review'),
        ]));
        event(new BookingNotification([
            'user_id' => $validated['service_provider_id'],
            'message' => 'You have received a review from ' . $user->name,
            'service_time' => 'Just Now',
        ]));



// Redirect back with a success message
        return redirect('dashboard')->with('flash.bannerStyle', 'success')->with('flash.banner', 'Review submitted successfully')->with('success', 'Review submitted successfully');
    }
    public function show()
    {
        $review = Review::all();
        return view('review-page', compact('review'));
    }
}
