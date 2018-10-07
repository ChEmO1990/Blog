<?php

namespace App\Transformers;

use App\Follower;
use League\Fractal\TransformerAbstract;

class FollowerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Follower $follower)
    {
        return [
            'id'        => (int) $follower->id,
            'follower'  => (int) $follower->follower,
            'following' => (int) $follower->following,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'follower' => 'follower',
            'following' => 'following',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}