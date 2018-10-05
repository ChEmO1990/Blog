<?php

namespace App\Http\Controllers\Api\Comment;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return $this->showAll($comments);
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
            'post_id' => 'required', 
            'title' => 'required',
            'content' => 'required', 
        ];

        $this->validate($request, $rules);

        $comment = Comment::create($request->all());
        return $this->showOne($comment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $this->showOne($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->fill($request->intersect([
            'user_id', 'post_id', 'title', 'content',
        ]));

        if( $comment->isClean()) {
            return $this->errorResponse('You must specify at least a different value to perform this request.', 422);
        }

        $comment->save();
        
        return $this->showOne($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return $this->showOne($comment);
    }
}
