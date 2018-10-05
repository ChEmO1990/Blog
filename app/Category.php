<?php

namespace App;

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
}
