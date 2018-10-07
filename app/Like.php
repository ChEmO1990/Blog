<?php

namespace App;

use App\User;
use App\Transformers\LikeTransformer;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $transformer = LikeTransformer::class;

    protected $table = 'likes';

    protected $fillable = [
        'id', 
        'user_id', 
        'post_id', 
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
