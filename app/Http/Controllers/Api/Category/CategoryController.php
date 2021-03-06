<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->showAll($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [ 
            'title' => 'required',
        ];

        $this->validate($request, $rules);

        $post = Category::create($request->all());
        return $this->showOne($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->showOne($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->only(['title',]));

        if( $category->isClean()) {
            return $this->errorResponse('You must specify at least a different value to perform this request.', 422);
        }

        $category->save();
        
        return $this->showOne($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->showOne($category);
    }

    public function get_posts($id) {
        $category = Category::findOrFail($id);    
        $posts = $category->posts;
        return $this->showAll($posts);
    }
}
