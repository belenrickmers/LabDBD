<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoryProduct;
use Faker\Generator as Faker;

$factory->define(CategoryProduct::class, function (Faker $faker) {
    $idCategory = App\Category::pluck('id')->toArray();
    $idProduct = App\Product::pluck('id')->toArray();

    return [
        'idCategory' => $faker->randomElement($idCategory),
        'idProduct' => $faker->randomElement($idProduct),
        
    ];
});
