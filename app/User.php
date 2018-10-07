<?php

namespace App;

use App\Post;
use App\Comment;
use App\Follower;
use App\Transformers\UserTransformer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $transformer = UserTransformer::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
        'email', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    public function posts() {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function followers() {
        return $this->hasMany(Follower::class, 'following', 'id');
    }
}
