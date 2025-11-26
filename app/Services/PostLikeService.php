<?php

namespace  App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikeService{
    public function toggleLike(Post $post) {
        $user = Auth::user();

        $existingLike = $post->likes()
            ->where('user_id', $user->id)
            ->first();

        // If already liked → UNLIKE
        if ($existingLike) {
            $existingLike->delete();
            $post->decrement('like_count');

            return [
                'is_liked' => false,
                'likes_count' => $post->like_count,
            ];
        }

        // If NOT liked → LIKE
        $post->likes()->create([
            'user_id' => $user->id,
        ]);

        $post->increment('like_count');

        return [
            'is_liked' => true,
            'likes_count' => $post->like_count,
        ];
    }
}
