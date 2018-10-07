<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\CategoryTransformer;

class Category extends Model
{
	public $transformer = CategoryTransformer::class;

	protected $table = 'categories';
	
	protected $fillable = [
        'id', 
        'title', 
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

    public function posts() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
