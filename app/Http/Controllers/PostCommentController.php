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
            'parent_id' => $request->parent_id,
        ]);
        $comment->load('user');
        $commenthtml = view('comments.comment', [
            'comment' => $comment,
            'post' => $post,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $commenthtml,
        ]);
    }
    public function show(PostCommentRequest $request, Post $post){
        $comments=$post->comments()->with('user')->latest()->paginate(3);

        if($request->ajax()){
            return view('comments.comment-list',compact('comments'))->render();
        }
        return view('posts.show',compact('post','comments'));
    }
    
}
