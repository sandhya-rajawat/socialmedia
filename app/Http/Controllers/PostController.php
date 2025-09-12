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
        return response()->json(['posts' => $posts]);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);
        $post->load('user');
        return response()->json([
            'success' => true,
            'post'    => $post->load('user')
        ]);
    }
}
