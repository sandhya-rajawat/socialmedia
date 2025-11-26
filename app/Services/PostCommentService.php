<?php

namespace App\Services;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;

class PostCommentService {
    public function storeComment(Post $post, array $data): PostComment
    {
        $comment = $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $data['content'],
            'parent_id' => $data['parent_id'] ?? null,
        ]);

        $comment->load('user');

        return $comment;
    }
}
