<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $idRole = App\Role::pluck('id')->toArray();
    return [
        'idRole' => $faker->randomElement($idRole),
        'password' => $faker->password,
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'dateofbirth' => $faker->dateTime($max = 'now', $timezone = null),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'contactNumber' => $faker->randomNumber($nbDigits = 8, $strict = false),
        'remember_token' => Str::random(10),
    ];
});
