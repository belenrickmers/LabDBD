<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'categoryName' => $faker->word, 
        'categoryDescription' => $faker->text($maxNbChars = 200),
        'visible' => $faker->boolean,
    ];
});
