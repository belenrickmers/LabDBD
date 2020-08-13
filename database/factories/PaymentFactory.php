<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'payMethod' => $faker->word,
        'paymentState' => $faker->boolean,
        'visible' => $faker->boolean,
        'tsPayment' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
