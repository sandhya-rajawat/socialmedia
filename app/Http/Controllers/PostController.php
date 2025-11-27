<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
use App\Services\PostService;
use Illuminate\Auth\Events\Validated;

class PostController extends Controller {
    protected $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index() {

        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request) {
        $post = $this->postService->createPost($request->validated());
        $postHtml = view('posts.post', compact('post'))->render();
        return response()->json([
            'success' => true,
            'html' => $postHtml,
        ]);
    }
    public function show(Post $post) {
        $post = $this->postService->showPost($post);
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post) {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }
    public function update(PostRequest $request, Post $post) {
        $this->postService->updatePost($post, $request->Validated());
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post) {
        $this->postService->destroyPost($post);
        return redirect()->route('posts.index');
    }
}
