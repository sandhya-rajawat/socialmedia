<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        if ($request->ajax()) {
            $html = view('layouts.post', compact('posts'))->render();
            return response()->json(['success' => true, 'html' => $html]);
        }

        return back()->with('success', 'Post created successfully!');
    }
}
