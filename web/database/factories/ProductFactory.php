<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'users_id' => $faker->numberBetween(1,50),
        'products_date' => $faker->dateTimeBetween($startDate = '-1 years'),
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
    ];
});
