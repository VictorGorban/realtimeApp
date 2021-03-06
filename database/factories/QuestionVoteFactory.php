<?php

/* @var $factory Factory */

use App\Model\Question;
use App\Model\QuestionVote;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(QuestionVote::class, function (Faker $faker) {
    return [
        'question_id' => function() {
            return Question::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        },
        'is_vote_up' => rand(rand(true, false), false),

    ];
});
