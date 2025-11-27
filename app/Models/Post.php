<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\PostComment;
class Post extends Model {
    use HasFactory;
    protected $fillable = ['user_id', 'content', 'like_count'];
    protected $appends = ['is_liked'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->hasMany(PostLike::class);
    }
    public function isliked(): Attribute {
        return Attribute::make(
            get: fn() => $this->likes()->where('user_id', Auth::id())->exists()
        );
    }
    public function comments() {
        return $this->hasMany(PostComment::class);
    }
}
