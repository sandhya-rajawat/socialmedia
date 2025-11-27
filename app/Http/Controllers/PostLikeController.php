<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostLikeService;

class PostLikeController extends Controller
{
    protected $postLikeService;

    public function __construct(PostLikeService $postLikeService)
    {
        $this->postLikeService = $postLikeService;
    }

    public function store(Post $post)
    {
        $data = $this->postLikeService->toggleLike($post);

        return response()->json([
            'success' => true,
            'is_liked' => $data['is_liked'],
            'likes_count' => $data['likes_count'],
        ]);
    }
}
