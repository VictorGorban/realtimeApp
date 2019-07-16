<?php

/* @var $factory Factory */

use App\Model\Category;
use App\Model\Question;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence();

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text(500),
        // we need an existing category id
        'category_id' => function () {
            return Category::all()->random();
        },
        'user_id' => function () {
            return User::all()->random();
        },
    ];
});
