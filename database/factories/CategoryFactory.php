<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	$name = $faker->unique()->word(8);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'departament_id' => rand(1, 8)
    ];
});
