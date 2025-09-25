<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PostLike;
use  App\Models\Post;
class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        $user = Auth::user();
        $alreadylike = $post->likes()->where('user_id', $user->id)->first();
        if ($alreadylike) {
            $alreadylike->delete();
            $post->decrement('like_count');
            return response()->json([
                'success' => true,
                'is_liked' => false,
                'likes_count' => $post->like_count,
            ]);
        }
        $post->likes()->create([
            'user_id' => $user->id,
        ]);
        $post->increment('like_count');
        return response()->json([
            'success' => true,
            'is_liked' => true,
            'likes_count' => $post->like_count,
        ]);
    }
}
