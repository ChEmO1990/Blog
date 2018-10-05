<?php

use App\Like;
use App\Post;
use App\Comment;
use App\Category;
use App\Follower;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
	return [
		'title' => $faker->paragraph(1),
	];
});

$factory->define(App\Comment::class, function (Faker $faker) {
	return [
		'user_id' => $faker->numberBetween(1,10),
		'post_id' => $faker->numberBetween(1,10),
		'title' => $faker->word,
		'content' => $faker->paragraph(1),
	];
});

$factory->define(App\Follower::class, function (Faker $faker) {
	return [
		'follower' => $faker->numberBetween(1,10),
		'following' => $faker->numberBetween(1,10),
	];
});

$factory->define(App\Like::class, function (Faker $faker) {
	return [
		'user_id' => $faker->numberBetween(1,10),
		'post_id' => $faker->numberBetween(1,10),
	];
});


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'category_id' => $faker->numberBetween(1,10),
        'title' => $faker->word,
        'content' => $faker->paragraph(1),
        'status' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
