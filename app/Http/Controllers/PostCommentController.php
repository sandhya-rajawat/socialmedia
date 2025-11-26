<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
use App\Services\PostCommentService;


class PostCommentController extends Controller {
    protected  $commentService;
    public function __construct(PostCommentService $commentService) {
        $this->commentService = $commentService;
    }
    public function store(PostCommentRequest $request, Post $post) {
        $comment = $this->commentService->storeComment($post,$request->validated());
        $commenthtml = view('comments.comment', [
            'comment' => $comment,
            'post' => $post,
        ])->render();
        return response()->json([
            'success' => true,
            'html' => $commenthtml,
        ]);
    }
}
