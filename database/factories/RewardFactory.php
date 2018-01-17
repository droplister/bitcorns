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

$factory->define(App\Reward::class, function (Faker $faker) {
    return [
        'token_id' => factory(Token::class)->create()->id,
        'reward_token' => strtoupper($faker->word),
        'quantity_per_unit' => $faker->randomDigitNotNull(),
        'block_index' => $faker->numberBetween(300000, 500000),
    ];
});
