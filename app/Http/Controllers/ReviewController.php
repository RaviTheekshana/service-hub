<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
// Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

// Create a new comment
        review::create($validated);

// Redirect back with a success message
        return redirect()->back()->with('success', 'Review posted successfully!');
    }
}
