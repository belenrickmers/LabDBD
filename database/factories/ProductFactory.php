<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'productName' => $faker->word,
        'price' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'productDescription' => $faker->text($maxNbChars = 250),
        'region' => $faker->word, 
        'comuna' => $faker->word,
        'availability' => $faker->boolean,
        'visible' => $faker->boolean,
        'reviewAverage' => $faker->randomDigit, 
    ];
});
