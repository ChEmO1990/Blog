<?php

use App\Like;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
use App\Follower;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
    	Category::truncate();
    	Comment::truncate();
    	Follower::truncate();
    	Like::truncate();
    	Post::truncate();

        $numUsers = 10;
    	$numCategories = 10;
    	$numComments = 100;
    	$numFollowers = 100;
    	$numLikes = 100;
    	$numPosts = 10;

        factory(User::class, $numUsers)->create();
    	factory(Category::class, $numCategories)->create();
    	factory(Comment::class, $numComments)->create();
    	factory(Follower::class, $numFollowers)->create();
    	factory(Like::class, $numLikes)->create();
    	factory(Post::class, $numPosts)->create();
    }
}
