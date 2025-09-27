<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentLike;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;
class PostComment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content','parent_id'];
    protected $appends = ['is_liked'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent(){
        return $this->belongsTo(PostComment::class, 'parent_id');
    }
    public function likes()
    {
        return $this->hasMany(CommentLike::class, 'comment_id');
    }
    public function replies()
    {
        return $this->hasMany(PostComment::class, 'parent_id');
    }

    public function isliked(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->likes()->where('user_id', Auth::id())->exists()
        );
    }
}
