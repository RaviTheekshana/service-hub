<?php
namespace App\Http\Controllers;

use App\Events\BookNotification;
use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function ourService()
    {
        return view('bookings.our-service');
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function bookForm()
    {
        return view('bookings.book');
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
                'phone_two' => 'required|string|max:12|different:phone',
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

        $user = auth()->user();
        $serviceProvider = User::find($request->service_provider_id);

        // Send notification to the user
        $user->notify(new BookNotification([
            'message' => 'Your booking has been created successfully!',
            'action' => url('dashboard'),
        ]));

        // Send notification to the service provider
        $serviceProvider->notify(new BookNotification([
            'message' => 'You have a new booking request!',
            'action' => url('/provider-booking'),
        ]));
        event(new BookNotification([
            'user_id' => $request->input('service_provider_id'),
            'service_date' => $request->input('service_date'),
            'service_time' => $request->input('service_time'),
        ]));

            return redirect()->route('dashboard')->with('success', 'Booking successfully created!');
        }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'service_date' => 'required|date',
            'service_time' => 'required',
            'status' => 'required|in:Pending,Confirmed,Completed,Cancelled',
        ]);

        // Find the booking by ID and update its details
        $book = Booking::findOrFail($id);
        $book->service_date = $request->service_date; // Storing as a timestamp
        $book->service_time = $request->service_time; // Assuming this is in 'H:i' format
        $book->status = $request->status;
        $book->save();

        // Get the user who made the booking
        $user = User::findOrFail($book->user_id);
        $serviceProvider = auth()->user();

        $user->notify(new BookingNotification([
            'message' => 'Your booking updated by ' .$serviceProvider->name,
            'action' => url('dashboard'),
        ]));

        // Send notification to the service provider
        $serviceProvider->notify(new BookingNotification([
            'message' => 'Your booking has been updated successfully!',
            'action' => url('/provider-booking'),
        ]));
        //Realtime notification
        event(new BookNotification([
            'user_id' => "$book->user_id",
            'message' => 'Your booking has been updated by ' .$serviceProvider->name,
            'service_time' => 'Just Now',
        ]));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Booking updated successfully!');
    }

}


