<?php

/* @var $factory Factory */

use App\Model\Reply;
use App\User;
use App\Model\Like;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'reply_id' => function() {
            return Reply::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        }

    ];
});
