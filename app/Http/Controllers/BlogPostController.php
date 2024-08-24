<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        return redirect()->back()->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Blog post created successfully!');
    }
    public function destroy()
    {
        $blogPost = BlogPost::findOrFail(request('id'));
        $blogPost->delete();
        if ($blogPost->image_path) {
            \Storage::disk('public')->delete($blogPost->image_path);
        }
        return redirect()->back()->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Blog post deleted successfully!');
    }
}
