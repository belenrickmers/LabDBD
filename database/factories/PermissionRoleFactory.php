<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PermissionRole;
use Faker\Generator as Faker;

$factory->define(PermissionRole::class, function (Faker $faker) {
    $idPermission = App\Permission::pluck('id')->toArray();
    $idRole = App\Role::pluck('id')->toArray();
    
    return [
        'idPermission' => $faker->randomElement($idPermission),
        'idRole' => $faker->randomElement($idRole),
    ];
});
