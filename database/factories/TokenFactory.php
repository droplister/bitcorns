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

$factory->define(App\Token::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['access', 'points']),
        'name' => strtoupper($faker->word),
        'source' => '1' . str_replace(':', '', $faker->ipv6),
        'issuer' => '1' . str_replace(':', '', $faker->ipv6),
        'quantity' => $faker->randomNumber(),
        'divisible' => $faker->randomElement([0, 1]),
        'locked' => $faker->randomElement([0, 1]),
    ];
});
