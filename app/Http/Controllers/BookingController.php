<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function ourService()
    {
        return view('bookings.our-service');
    }

    public function showReview()
    {
        return view('bookings.review');
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function bookForm()
    {
        return view('bookings.book');
    }
    public function success()
    {
        return view('bookings.success');
    }
    public function store(Request $request)
        {
            $request->validate([
                'service_date' => 'required|date',
                'service_time' => 'required',
                'category_id' => 'required|exists:categories,id',
                'service_provider_id' => 'required|exists:users,id',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'phone' => 'required|string|max:12',
                'phone_two' => 'required|string|max:12',
                'email' => 'required|email|max:255',
                'description' => 'required|string',
            ]);

            Booking::create([
                'user_id' => auth()->id(),
                'service_date' => $request->input('service_date'),
                'service_time' => $request->input('service_time'),
                'category_id' => $request->input('category_id'),
                'service_provider_id' => $request->input('service_provider_id'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone'),
                'phone_two' => $request->input('phone_two'),
                'email' => $request->input('email'),
                'description' => $request->input('description'),
            ]);

            return redirect()->route('bookings.success')->with('success', 'Booking successfully created!');
        }
}


