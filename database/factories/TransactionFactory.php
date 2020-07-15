<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    $idUser = App\User::pluck('id')->toArray();
    $idProduct = App\Product::pluck('id')->toArray();
    $idReview = App\Review::pluck('id')->toArray();
    $idPayment = App\Payment::pluck('id')->toArray();

    return [
        'idUser' => $faker->randomElement($idUser),
        'idProduct' => $faker->randomElement($idProduct),
        'idReview' => $faker->randomElement($idReview),
        'idPayment' => $faker->randomElement($idPayment),
        'rentTime' => $faker->dateTime($max = 'now', $timezone = null),
        'tsTransaction' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
