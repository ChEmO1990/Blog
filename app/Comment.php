<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
}
