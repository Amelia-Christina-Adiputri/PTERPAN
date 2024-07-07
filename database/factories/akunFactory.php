<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(CategoryModel::class, function (Faker $faker) {
    return [
        'role' => 'admin',
        'id_unit' => '1',
        'name' => $faker->words(3, true),
        'name' => $faker->email(),
        'password' => '123'
    ];
});
