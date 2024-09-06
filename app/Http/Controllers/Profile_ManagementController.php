<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Profile_Management;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Profile_ManagementController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();
        // Fetch or create the service provider profile data
        $profile = Profile_Management::where('service_provider_id', $user->id)->first();
        // Pass the data to the view
        return view('Provider-Dashboard.provider-profile', [
            'user' => $user,
            'profile' => $profile
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(), // Ignore unique validation for the current user
            'phone' => 'required|string|max:15',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'personal_summary' => 'nullable|string|max:1000',
            'work_experience' => 'nullable|string|max:1000',
            'status' => 'nullable|in:pending,approved,rejected'
        ]);
        //Check if the users service provider profile already exists
        $profile = Profile_Management::where('service_provider_id', auth()->id())->first();
        if ($profile) {
            return redirect()->route('profile_management.index')->with('error', 'Profile already exists.');
        }

        // Handle the certificate file upload if provided
        $certificatePath = null;
        if ($request->hasFile('certificate')) {
            $certificatePath = $request->file('certificate')->store('certificates', 'public');
        }

        // Fetch the service provider user
        $user = auth()->user();

        Profile_Management::updateOrCreate(
            [
                'service_provider_id' => $user->id,
                'experience_years' => $request['experience_years'],
                'hourly_rate' => $request['hourly_rate'],
                'certificate_path' => $certificatePath,
                'personal_summary' => $request['personal_summary'],
                'work_experience' => $request['work_experience'],
                'category_id' => $request['category_id']
            ]
        );
        $user->notify(new BookingNotification([
            'message' => 'Your profile has been created successfully!',
            'action' => url('/provider-dashboard'),
        ]));
        return redirect()->route('profile_management.index')
            ->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Profile created successfully.')->with('success', 'Profile created successfully.');
    }


    public function show(Profile_Management $profile_management)
    {
       //Get Selected Profile detail from All Profiles
        $portfolio = Profile_Management::where('id', $profile_management->id)->first();
        if (!$portfolio) {
            // Handle the case where the profile isn't found
            return redirect()->route('profile_management.index')->with('error', 'Profile not found.');
        }
        // Load the chats where the authenticated user is the customer
        $chats = Chat::where('customer_id', auth()->id())
            ->where('provider_id', $portfolio->service_provider_id)
            ->get();
        // If no chat exists, create a new one
        if ($chats->isEmpty()) {
            $newChat = Chat::create([
                'customer_id' => auth()->id(),
                'provider_id' => $portfolio->service_provider_id,
                'status' => true,
                // Add any other necessary fields for the Chat model
            ]);

            // Pass the new chat to the view
            $chats = collect([$newChat]);
        }
        return view('Provider-Dashboard.portfolio', compact('chats','portfolio'));
    }

    public function edit(Profile_Management $profile_Management)
    {
    }

    public function update(Request $request, Profile_Management $profile_Management)
    {
    }
    public function destroy(Profile_Management $profileManagement)
    {
        // If there's a file associated with the profile, delete it
        if ($profileManagement->certificate_path) {
            Storage::disk('public')->delete($profileManagement->certificate_path);
        }

        // Delete the profile from the database
        $profileManagement->delete();

        // Redirect back with a success message
        return redirect()->route('profile_management.index')->with('success', 'Profile deleted successfully.');
    }


}
