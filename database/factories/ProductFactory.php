<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 3),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat(2, 0, 100), 
        'size' => $faker->randomElement(['46', '48', '50', '52']),
        'status' => $faker->randomElement(['published', 'unpublished']),
        'code' => $faker->randomElement(['new', 'solde']),
        'reference' => $faker->ean13(),
    ];
});
