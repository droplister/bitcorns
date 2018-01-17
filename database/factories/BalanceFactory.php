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

$factory->define(App\Balance::class, function (Faker $faker) {
    return [
        'player_id' => factory(Player::class)->create()->id,
        'token_id' => factory(Token::class)->create()->id,
        'quantity' => $faker->randomNumber(),
    ];
});
