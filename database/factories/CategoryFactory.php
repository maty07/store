<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
	$name = $faker->unique()->word(8);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'image' => $faker->imageUrl(),
        'active' => 1,
        'departament_id' => rand(1, 11)
    ];
});
