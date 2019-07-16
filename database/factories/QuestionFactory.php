<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence();

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text(500),
        // we need an existing category id
        'category_id' => function () {
            return \App\Model\Category::all()->random();
        },
        'user_id' => function () {
            return \App\User::all()->random();
        },
    ];
});
