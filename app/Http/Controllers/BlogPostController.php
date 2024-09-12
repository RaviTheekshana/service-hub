<?php

namespace App\Http\Controllers;

use App\Events\BookNotification;
use App\Models\BlogPost;
use App\Models\User;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::latest()->get(); // Retrieve all blog posts, sorted by latest
        return view('bookings.create', compact('blogPosts'));
    }
        public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog-images', 'public');
        }

        BlogPost::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);
        $user = auth()->user();
        $user->notify(new BookingNotification([
            'message' => 'Job post created successfully!',
            'action' => route('job.index'),
        ]));

        return redirect()->back()->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Job post created successfully!')->with('success', 'Job post created successfully!');
    }
    public function destroy()
    {
        $blogPost = BlogPost::findOrFail(request('id'));
        $blogPost->delete();
        if ($blogPost->image_path) {
            \Storage::disk('public')->delete($blogPost->image_path);
        }
        $user = auth()->user();
        $user->notify(new BookingNotification([
            'message' => 'Blog post deleted successfully!',
            'action' => route('dashboard'),
        ]));
        return redirect()->back()->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Blog post deleted successfully!');
    }
}
