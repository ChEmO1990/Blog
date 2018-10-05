<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';

    protected $fillable = [
        'id', 
        'follower', 
        'following', 
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];
}
