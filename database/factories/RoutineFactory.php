<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Routine::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => collect(['count', 'interval'])->random(),
        'user_id' => rand(1,10000)
    ];
});
