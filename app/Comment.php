<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\CommentTransformer;

class Comment extends Model
{
    public $transformer = CommentTransformer::class;

    protected $table = 'comments';

    protected $fillable = [
        'id', 
        'user_id', 
        'post_id', 
        'title', 
        'content',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

    public function likes() {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }
}
