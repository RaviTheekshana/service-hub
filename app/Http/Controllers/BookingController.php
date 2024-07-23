<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Service_date' => 'required|date',
            'Provider' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'Status' => 'required|string',
            'Description' => 'required|string',
        ]);

        Booking::create([
            'service_date' => $request->Service_date,
            'service_Provider' => $request->Provider,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->Status,
            'description' => $request->Description,
        ]);

        return redirect()->route('bookings.create')->with('success', 'Booking created successfully.');
    }
}

