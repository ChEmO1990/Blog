<?php

namespace App\Transformers;

use App\Like;
use League\Fractal\TransformerAbstract;

class LikeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Like $like)
    {
        return [
            'id'      => (int) $like->id,
            'user_id' => (int) $like->user_id,
            'post_id' => (int) $like->post_id,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id'      => 'id',
            'user_id' => 'user_id',
            'post_id' => 'post_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}