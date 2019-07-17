<?php

/* @var $factory Factory */

use App\Model\Answer;
use App\User;
use App\Model\AnswerVote;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(AnswerVote::class, function (Faker $faker) {
    return [
        'answer_id' => function() {
            return Answer::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        },
        'vote_up' => rand(true, false),

    ];
});
