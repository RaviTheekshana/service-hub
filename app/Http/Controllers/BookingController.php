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
            'Status' => 'required|string',
            'Description' => 'required|string',
        ]);

        Booking::create([
            'Service_Date' => $request->Service_date,
            'Service_Provider' => $request->Provider,
            'Status' => $request->Status,
            'Description' => $request->Description,
        ]);

        return redirect()->route('bookings.create')->with('success', 'Booking created successfully.');
    }
}

