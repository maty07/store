<?php

use Faker\Generator as Faker;

$factory->define(App\Departament::class, function (Faker $faker) {
	$name = $faker->unique()->word(10);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'active' => 1
    ];
});
