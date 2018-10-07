<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', 'Api\Post\PostController', ['except' =>['create', 'edit']]);
Route::resource('categories', 'Api\Category\CategoryController', ['except' =>['create', 'edit']]);
Route::resource('comments', 'Api\Comment\CommentController', ['except' =>['create', 'edit']]);
Route::resource('followers', 'Api\Follower\FollowerController', ['except' =>['create', 'edit']]);
