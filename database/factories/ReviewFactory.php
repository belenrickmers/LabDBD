<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'comment' => $faker->text,
        'rate' => $faker->randomDigit,
        'visible' => $faker->boolean,
    ];
});
