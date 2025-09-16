<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    protected $fillable = ['user_id', 'content', 'like_count'];
    protected $appends = ['is_liked'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function isLiked(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->likes()->where('user_id', Auth::id())->exists()
        );
    }
}
