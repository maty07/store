<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	$name = $faker->unique()->sentence(5);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(200),
        'image' => $faker->imageUrl($width = 300, $height = 300),
        'price' => rand(1000, 1000000),
        'quantity' => rand(1, 1000),
        'category_id' => rand(1, 100)
    ];
});
