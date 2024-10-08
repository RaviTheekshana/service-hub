<?php

namespace App\Http\Controllers;

use App\Models\Profile_Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilePhotoController extends Controller
{
    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max size
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        // Store the new photo
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Store the new photo and get the file path
            $path = $request->file('photo')->store('profile-photos', 'public');

            // Update user's profile photo path
            $user->profile_photo_path = $path;
            $user->save();
        }

        return redirect()->back()->with('flash.bannerStyle', 'success')->with('flash.banner', 'Profile photo updated successfully.')->with('success', 'Profile photo updated successfully.');
    }
    public function updateBg(Request $request)
    {
        $request -> validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max size
        ]);

        $user = Auth::user();
        $profile = Profile_Management::where('service_provider_id', $user->id)->first();
        $path = $request->file('cover')->store('profile-bg', 'public');
        $profile->profile_bg_path = $path;
        $profile->save();
        return redirect()->back()->with('success', 'Profile background updated successfully.');

    }
}

