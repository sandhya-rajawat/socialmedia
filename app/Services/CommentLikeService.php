<?php

namespace App\Services;

use App\Models\CommentLike;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;

class CommentLikeService {
    public function toggleLike(PostComment $comment) {
        $user = Auth::user();
        // Check if user already liked
        $existingLike = $comment->likes()->where('user_id', $user->id)->first();
        if ($existingLike) {
            // Remove like
            $existingLike->delete();
            $is_liked = false;
        } else {
            // Add like, prevent duplicates
            $comment->likes()->firstOrCreate(['user_id' => $user->id]);
            $is_liked = true;
        }
        $likes_count = $comment->likes()->count();
        return [

            'is_liked' => $is_liked,
            'likes_count' => $likes_count,
        ];
    }
}
