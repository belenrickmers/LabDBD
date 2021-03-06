<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'roleName' => $faker->word,
        'roleDescription' => $faker->text,
        'visible' => $faker->boolean,
    ];
});
