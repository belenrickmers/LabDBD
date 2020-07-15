<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProduct;
use Faker\Generator as Faker;

$factory->define(UserProduct::class, function (Faker $faker) {
    $idUser = App\User::pluck('id')->toArray();
    $idProduct = App\Product::pluck('id')->toArray();

    return [
        'idUser' => $faker->randomElement($idUser),
        'idProduct' => $faker->randomElement($idProduct),
    ];
});
