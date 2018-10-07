<?php

namespace App;

use App\Like;
use App\User;
use App\Comment;
use App\Category;
use App\Transformers\PostTransformer;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $transformer = PostTransformer::class;
    
    protected $table = 'posts';

    protected $fillable = [
        'id', 
        'title', 
        'body', 
        'status',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function likes() {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }
}
