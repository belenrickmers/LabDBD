<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'pay_method' => $faker->words($nb = 3, $asText = true),
        'payment_state' => $faker->boolean,
        'ts_payment' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
