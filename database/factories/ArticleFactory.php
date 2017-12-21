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

$factory->define(App\Models\Article::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;

    return [
        'title' => $faker->unique()->sentence(6),
        'content' => $faker->text(1000),
        'user_id' => $faker->numberBetween(1, 5),
        'cate_id' => $faker->numberBetween(1, 5),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
