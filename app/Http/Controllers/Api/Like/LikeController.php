<?php

namespace App\Http\Controllers\Api\Like;

use App\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class LikeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes = Like::all();
        return $this->showAll($likes);
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
        ];

        $this->validate($request, $rules);

        $like = Like::create($request->all());
        return $this->showOne($like, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        return $this->showOne($like);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        $like->fill($request->intersect([
            'user_id', 'post_id',
        ]));

        if( $like->isClean()) {
            return $this->errorResponse('You must specify at least a different value to perform this request.', 422);
        }

        $like->save();
        
        return $this->showOne($like);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like->delete();
        return $this->showOne($like);
    }
}
