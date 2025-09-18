<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller

{
    public function index(Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->get();
        return response()->json([
            'success' => true,
            'comments' => $comments,
        ]);
    }
    public function store(PostCommentRequest $request, Post $post)
    {
        $content = PostComment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        $content->load('user');
        return response()->json([
            'success' => true,
            'content' => $content,
        ]);
    }
}
