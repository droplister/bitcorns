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

$factory->define(App\Harvest::class, function (Faker $faker) {
    return [
        'bitcorn_total' => $faker->randomDigitNotNull(),
        'bitcorn_per_crops' => $faker->randomDigitNotNull(),
        'block_index' => $faker->numberBetween(300000, 500000),
    ];
});
