<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(\App\Http\Middleware\AdminMiddleware::class);
    }

    // Admin dashboard with pending posts
    public function dashboard()
    {
        $pendingPosts = Post::pending()->latest()->get();
        return view('admin.dashboard', compact('pendingPosts'));
    }

    // Show accepted posts
    public function acceptedPosts()
    {
        $acceptedPosts = Post::accepted()->latest()->get();
        return view('admin.accepted', compact('acceptedPosts'));
    }

    // Show declined posts
    public function declinedPosts()
    {
        $declinedPosts = Post::declined()->latest()->get();
        return view('admin.declined', compact('declinedPosts'));
    }

    // Accept a post
    public function acceptPost(Post $post)
    {
        $post->update(['status' => 'accepted']);
        return redirect()->back()->with('success', 'Post accepted successfully!');
    }

    // Decline a post
    public function declinePost(Post $post)
    {
        $post->update(['status' => 'declined']);
        return redirect()->back()->with('success', 'Post declined successfully!');
    }

    // Delete a post
    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}