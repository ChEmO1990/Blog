<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\FollowerTransformer;

class Follower extends Model
{
    public $transformer = FollowerTransformer::class;

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
