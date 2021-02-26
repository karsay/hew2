<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
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
    return [
        'users_name' => $faker->name,
        'users_email' => $faker->unique()->freeEmail,
        'users_gender' => $faker->numberBetween(0,1),
        'users_birthday' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
        'users_postal_code' => $faker->postcode,
        'users_state' => $faker->prefecture,
        'users_city' => $faker->city . $faker->streetAddress,
        'users_suburb' => $faker->buildingNumber,
        'users_profile' => $faker->realText(),
        'users_images_path' => 'test.jpg',
        'users_signup_date' => now(),
    ];
});
