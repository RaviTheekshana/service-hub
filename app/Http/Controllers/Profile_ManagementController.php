<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Profile_Management;
use App\Models\User;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function store(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(), // Ignore unique validation for the current user
            'phone' => 'required|string|max:15',
            'experience_years' => 'required|integer|min:0',
            'hourly_rate' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'certificate' => 'required|file|mimes:pdf|max:2048',
            'personal_summary' => 'required|string|max:1000',
            'work_experience' => 'required|string|max:1000',
            'status' => 'nullable|in:pending,approved,rejected'
        ]);
        //Check if the users service provider profile already exists
        $profile = Profile_Management::where('service_provider_id', auth()->id())->first();
        if ($profile) {
            return redirect()->route('profile_management.index')->with('error', 'Profile already exists.');
        }
        // Store the certificate file
        $certificatePath = null;
        if ($request->hasFile('certificate')) {
            $certificatePath = $request->file('certificate')->store('certificates', 'public');
        }
        // Fetch the service provider user
        $user = auth()->user();

        $profile = Profile_Management::updateOrCreate(
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
        $profile->addMediaFromRequest('certificate')->toMediaCollection('certificate_path');


        $user->notify(new BookingNotification([
            'message' => 'Your profile has been created successfully and expect admin approval in a few days!',
            'action' => url('/provider-dashboard'),
        ]));
        event(new BookingNotification([
            'user_id' => $user->id,
            'message' => 'You Profile has been created successfully!',
            'service_time' => 'Just Now',
        ]));
        return redirect()->route('profile_management.index')
            ->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Profile created successfully.')->with('success', 'Profile created successfully.');
    }


    public function show(Profile_Management $profile_management)
    {
        //if the user guest, redirect to login page
        if (auth()->guest()) {
            return view('components.guestvisibility');
        }
       //Get Selected Profile detail from All Profiles
        $portfolio = Profile_Management::where('id', $profile_management->id)->first();
        if (!$portfolio) {
            // Handle the case where the profile isn't found
            return redirect()->route('profile_management.index')->with('error', 'Profile not found.');
        }
        // Retrieve all media from 'project_images' collection
        $mediaItems = $profile_management->getMedia('project_images');
        $mediaItems2 = $profile_management->getFirstMediaUrl('certificate_path');
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
        return view('Provider-Dashboard.portfolio', compact('chats','portfolio', 'mediaItems', 'mediaItems2'));
    }

    public function edit(Profile_Management $profile_Management)
    {
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Request $request, Profile_Management $profile_Management)
    {
        // Validate the incoming file array
        $request->validate([
            'project' => 'required|array',
            'project.*' => 'image|max:2048', // Validate each file
        ]);
        $profile = Profile_Management::where('service_provider_id', auth()->id())->first();
        if ($request->hasFile('project')) {
            foreach ($request->file('project') as $file) {
                if ($file->isValid()) {

                    $profile->addMedia($file)->toMediaCollection('project_images');
                }
            }
        }


        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }
    public function destroy(Profile_Management $profileManagement)
    {
        // If there's a file associated with the profile, delete it
        $profileManagement->clearMediaCollection('certificate_path');
        $profileManagement->clearMediaCollection('project_images');

        if($profileManagement->certificate_path){
            Storage::disk('public')->delete($profileManagement->certificate_path);
        }
        // Delete the profile from the database
        if($profileManagement->profile_bg_path){
            Storage::disk('public')->delete($profileManagement->profile_bg_path);
        }
        $profileManagement->delete();

        $serviceProvider = User::find($profileManagement->service_provider_id);
        $serviceProvider->notify(new BookingNotification([
            'message' => 'Your profile has been deleted successfully!',
            'action' => url('/provider-dashboard'),
        ]));

        event(new BookingNotification([
            'user_id' => $profileManagement->service_provider_id,
            'message' => 'You Profile has been created successfully!',
            'service_time' => 'Just Now',
        ]));
        // Redirect back with a success message
        return redirect()->route('profile_management.index')->with('success', 'Profile deleted successfully.');
    }


}
