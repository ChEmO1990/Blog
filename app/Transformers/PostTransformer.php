<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id'      => (int) $post->id,
            'post_title'   => (string) $post->title,
            'post_body' => (string) $post->body,
            'post_status'  => (boolean) $post->status,
            'post_author'  => $post->user,
            'post_category'  => $post->category,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'post_title' => 'title',
            'post_body' => 'body',
            'post_status' => 'status',
            'post_author'  => 'user',
            'post_category'  => 'category',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}