<?php

namespace App\Transformers;

use App\Post;
use App\Comment;
use App\Transformers\PostTransformer;
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
            'idddd'      => (int) $post->id,
            'title'   => (string) $post->title,
            'content' => (string) $post->content,
            'status'  => (boolean) $post->status,
            'comments'  => $post->comments,
            'user'  => $post->user,
            'category'  => $post->category,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'posteeeeee_id' => 'id',
            'post_title' => 'title',
            'post_content' => 'content',
            'post_status' => 'status',
            'commentsss'  => 'comments',
            'userrr'  => 'user',
            'categoryyy'  => 'category',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public function includeComments(Post $post)
    {
        return $this->collection($post->comments, new PostTransformer);
    }
}