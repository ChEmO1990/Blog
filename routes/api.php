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

//User Endpoints
Route::resource('users', 'Api\User\UserController', ['except' =>['create', 'edit']]);
Route::get('users/{id}/posts', 'Api\User\UserController@get_posts');
Route::get('users/{id}/comments', 'Api\User\UserController@get_comments');
Route::get('users/{id}/followers', 'Api\User\UserController@get_followers');

//Post Endpoints
Route::resource('posts', 'Api\Post\PostController', ['except' =>['create', 'edit']]);
Route::get('posts/{id}/comments', 'Api\Post\PostController@get_comments');
Route::get('posts/{id}/likes', 'Api\Post\PostController@get_likes');

//Categories Endpoints
Route::resource('categories', 'Api\Category\CategoryController', ['except' =>['create', 'edit']]);
Route::get('categories/{id}/posts', 'Api\Category\CategoryController@get_posts');

//Comments Endpoints
Route::resource('comments', 'Api\Comment\CommentController', ['except' =>['create', 'edit']]);

//Likes Endpoints
Route::resource('likes', 'Api\Like\LikeController', ['except' =>['create', 'edit']]);

//Followers Endpoints
Route::resource('followers', 'Api\Follower\FollowerController', ['except' =>['create', 'edit']]);