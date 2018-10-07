<?php

namespace App\Http\Controllers\Api\Follower;

use App\Follower;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class FollowerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followers = Follower::all();
        return $this->showAll($followers);
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
            'follower' => 'required', 
            'following' => 'required', 
        ];

        $this->validate($request, $rules);

        $follower = Follower::create($request->all());
        return $this->showOne($follower, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Follower $follower)
    {
        return $this->showOne($follower);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follower $follower)
    {
        $Follower->fill($request->intersect([
            'follower', 'following',
        ]));

        if( $follower->isClean()) {
            return $this->errorResponse('You must specify at least a different value to perform this request.', 422);
        }

        $follower->save();
        
        return $this->showOne($follower);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follower $follower)
    {
        $follower->delete();
        return $this->showOne($follower);
    }
}
