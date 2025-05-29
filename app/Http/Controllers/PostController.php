<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display homepage with accepted posts
    public function index()
    {
        $posts = Post::accepted()->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Show form to create new post
    public function create()
    {
        return view('posts.create');
    }

    // Store new post
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:10|max:1000',
        ]);

        Post::create([
            'content' => $request->content,
            'status' => 'pending'
        ]);

        return redirect()->route('posts.create')
                        ->with('success', 'Your post has been submitted and is awaiting approval!');
    }
}