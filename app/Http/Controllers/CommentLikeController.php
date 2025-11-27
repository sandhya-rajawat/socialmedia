<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
use App\Services\CommentLikeService;

class CommentLikeController extends Controller {
    protected $likeService;

    public function __construct(CommentLikeService $likeService) {
        $this->likeService = $likeService;
    }
    public function store(PostComment $comment) {

        $result = $this->likeService->toggleLike($comment);

        return response()->json(array_merge(['success' => true], $result));
    }
}
