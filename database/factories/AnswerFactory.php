<?php

/* @var $factory Factory */

use App\Model\Question;
use App\Model\Answer;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'question_id' => function () {
            return Question::all()->random();
        },
        'user_id' => function () {
            return User::all()->random();
        },
    ];
});
