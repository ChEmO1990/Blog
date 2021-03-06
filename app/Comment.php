<?php

namespace App;

use App\Like;
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
        'body',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];
}
