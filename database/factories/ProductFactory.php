<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	$name = $faker->unique()->sentence(5);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(200),
        'image' => $faker->imageUrl($width = 500, $height = 500),
        'price' => rand(1000, 1000000),
        'quantity' => rand(1, 1000),
        'active' => 1,
        'category_id' => rand(1, 100)
    ];
});
