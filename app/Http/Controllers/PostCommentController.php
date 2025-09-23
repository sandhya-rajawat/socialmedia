<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller

{

    public function store(PostCommentRequest $request, Post $post)
    {
        $comment = $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        $comment->load('user');
        $commenthtml = view('comments.comment', compact('comment'))->render();
        return response()->json([
            'success' => true,
            'html' => $commenthtml

        ]);
    }
}
