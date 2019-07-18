<?php

/* @var $factory Factory */

use App\Model\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        'name' => $name,
//        'slug' => Str::slug($name),

    ];
});
