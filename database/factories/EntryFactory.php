<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Entry::class, function (Faker $faker) {
    return [
        'routine_id' => rand(1,10000),
    ];
});

$factory->state(App\Models\Entry::class, 'count', function ($faker) {
    return [
        'count' => rand(1,100),
    ];
});

$factory->state(App\Models\Entry::class, 'interval', function ($faker) {
    return [
        'start' => '2018-01-01 15:00:00',
        'end' => '2018-01-01 15:30:00',
    ];
});
