<?php

use App\Post;
use App\User;
use App\Comment;
use App\Follower;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function() {
	/*
	$post = new Comment;
	$post->user_id = 1;
	$post->post_id = 1;
	$post->title = 'Title Comment 1';
	$post->content = 'Content Comment 1';
	$post->save();
	*/

	$event = Post::with('comments', 'user', 'category')->first();
	$event->toJson();

	echo $event;
});
