<?php

namespace  App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService {
    public function getAllPosts() {
        return  Post::with('user', 'likes', 'comments.user')->withCount('likes')->latest()->get();
    }
    public function createPost(array $data) {
        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $data['content'],
        ]);
        $post->load('user', 'comments.user')->loadCount('Likes');
        $post->is_liked = false;
        return $post;
    }
    public function showPost(Post $post) {
        $post->load('user', 'likes', 'comments.user');
        $post->is_liked = $post->likes->contains(Auth::id());
        return $post;
    }
    public function updatePost(Post $post,array $data){
           if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->update(['content' => $data['content']]);
        return $post;

    }
    public function destroyPost(Post $post){
          if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->delete();
        return $post;
    }
}
