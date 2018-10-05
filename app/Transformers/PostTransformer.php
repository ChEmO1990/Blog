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
            'post_content' => (string) $post->content,
            'post_status'  => (boolean) $post->status,
            'author'  => $post->user,
            'category'  => $post->category,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'title' => 'title',
            'content' => 'content',
            'status' => 'status',
            'user'  => 'user',
            'category'  => 'category',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}