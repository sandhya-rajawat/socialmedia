<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    public function store(PostComment $comment)
    {
        $user = Auth::user();
        $alreadylike = $comment->commentlike()->where('user_id', $user->id)->first();

        if ($alreadylike) {
            // Unlike
            $alreadylike->delete();
            $isLiked = false;
        } else {
            // Like
            $comment->commentlike()->create([
                'user_id' => $user->id,
            ]);
            $isLiked = true;
        }

        return response()->json([
            'success' => true,
            'is_liked'  => $isLiked,
            'likeCount' => $comment->commentlike()->count()
        ]);
    }
}
