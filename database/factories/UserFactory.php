<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    static $password;

    return [
        'uname' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->unique()->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
