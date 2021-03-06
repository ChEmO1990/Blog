<?php

namespace App\Http\Controllers\Api\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return $this->showAll($posts);
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
            'user_id' => 'required', 
            'category_id' => 'required', 
            'title' => 'required',
            'body' => 'required', 
            'status' => 'boolean', 
        ];

        $this->validate($request, $rules);

        $post = Post::create($request->all());
        return $this->showOne($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $this->showOne($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->fill($request->intersect([
            'user_id', 'category_id', 'title', 'body', 'status'
        ]));

        if( $post->isClean()) {
            return $this->errorResponse('You must specify at least a different value to perform this request.', 422);
        }

        $post->save();
        
        return $this->showOne($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $this->showOne($post);
    }

    public function get_comments($id) {
        $post = Post::findOrFail($id);    
        $comments = $post->comments;
        return $this->showAll($comments);
    }

    public function get_likes($id) {
        $post = Post::findOrFail($id);    
        $likes = $post->likes;
        return $this->showAll($likes);
    }
}