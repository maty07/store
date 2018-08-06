<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'total' => rand(1000, 2000000)
    ];
});
