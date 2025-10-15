<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
  public function index(Request $request)
{
    $postId = $request->post_id;
    $page = $request->page ?? 1;
    $comments = PostComment::with(['user', 'replies.user', 'likes',])->latest()->paginate(3);
    return view('comments.comment-list',compact('comments'));
}
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        $post->load('user', 'comments.user')->loadCount('Likes');
        $post->is_liked = false;
        $postHtml = view('posts.post', compact('post'))->render();
        return response()->json([
            'success' => true,
            'html' => $postHtml,
        ]);
    }
    public function show(Post $post)
    {
        $post->load('user', 'likes', 'comments.user');
        $post->is_liked = $post->likes->contains(Auth::id());
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }
    public function update(PostRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->update(['content' => $request->content]);
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
