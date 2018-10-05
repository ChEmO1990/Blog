<?php

namespace App\Transformers;

use App\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Comment $comment)
    {
        return [
            'comment_id' => (int)    $comment->id,
            'user_id'    => (int)    $comment->user_id,
            'post_id'    => (int)    $comment->post_id,
            'title'      => (string) $comment->title,
            'content'    => (string) $comment->content,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id'      => 'id',
            'user_id' => 'user_id',
            'post_id' => 'post_id',
            'title'   => 'title',
            'content' => 'content',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}