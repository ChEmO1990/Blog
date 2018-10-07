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
            'comment_id'    => (int)    $comment->id,
            'user_id'       => (int)    $comment->user_id,
            'post_id'       => (int)    $comment->post_id,
            'comment_title' => (string) $comment->title,
            'comment_body'  => (string) $comment->body,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'comment_id'      => 'id',
            'user_id' => 'user_id',
            'post_id' => 'post_id',
            'comment_title'   => 'title',
            'comment_body' => 'body',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}