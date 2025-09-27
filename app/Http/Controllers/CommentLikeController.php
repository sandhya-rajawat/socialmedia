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
        $likeCount = $comment->likes()->count();
        return response()->json([
            'success' => true,
            'is_liked' => $is_liked,
            'likeCount' => $likeCount,
        ]);
    }
}
