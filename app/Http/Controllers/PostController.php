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
        $userId = Auth::id();
        $posts = Post::with('user', 'likes', 'comments.user')->withCount('likes')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);
        $post->load('user', 'comments.user')->loadCount('likes');
        $post->is_liked = false;
        $postHtml = view('posts.post', compact('post'))->render();
        return response()->json([
            'success' => true,
            'html' => $postHtml
        ]);
    }
}
