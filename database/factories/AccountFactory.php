<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    $idRole = App\User::pluck('id')->toArray();

    return [
        'idUser' => $faker->randomElement($idUser),
        'card_number' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'card_type' => $faker->word, 
        'bank' => $faker->word,
    ];
});
