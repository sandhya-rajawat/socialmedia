<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommentLike;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;


class PostComment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content'];

    protected $appends = ['is_liked'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commentlike()
    {
        return $this->hasMany(CommentLike::class, 'comment_id');
    }
    public function isliked(): Attribute

    {
        return Attribute::make(
            get: fn() => $this->commentlike()->where('user_id', Auth::id())->exists()
        );
    }
}
