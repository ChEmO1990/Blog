<?php

namespace App\Http\Controllers\Api\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->showAll($users);
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
            'name' => 'required', 
            'email' => 'required', 
            'password' => 'required',
        ];

        $this->validate($request, $rules);

        $user = User::create($request->all());
        return $this->showOne($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->intersect([
            'name', 'email', 'password',
        ]));

        if( $user->isClean()) {
            return $this->errorResponse('You must specify at least a different value to perform this request.', 422);
        }

        $user->save();
        
        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showOne($user);
    }

    public function get_posts($id) {
        $user = User::findOrFail($id);    
        $posts = $user->posts;
        return $this->showAll($posts);
    }

    public function get_comments($id) {
        $user = User::findOrFail($id);    
        $comments = $user->comments;
        return $this->showAll($comments);
    }

    public function get_followers($id) {
        $user = User::findOrFail($id);    
        $followers = $user->followers;
        return $this->showAll($followers);
    }
}
