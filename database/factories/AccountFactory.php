<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    $idUser = App\User::pluck('id')->toArray();

    return [
        'idUser' => $faker->randomElement($idUser),
        'cardNumber' => $faker->numerify('############'),
        'cardType' => $faker->word, 
        'bank' => $faker->word,
        'visible' => $faker->boolean,
    ];
});
