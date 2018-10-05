<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'id'             => (int)    $category->id,
            'category_title' => (string) $category->title,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'title' => 'title',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}