<?php

/* @var $factory Factory */

use App\Model\Answer;
use App\Model\Vote;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'answer_id' => function() {
            return Answer::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        },
        'is_vote_up' => rand(rand(true, false), false),
    ];

});
