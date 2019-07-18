<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Answer;
use App\Model\Vote;
use App\User;
use Faker\Generator as Faker;

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
