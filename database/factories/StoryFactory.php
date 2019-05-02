<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Story;
use Faker\Generator as Faker;

$factory->define(Story::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(mt_rand(3,10), true),
        'slug' => $faker->slug,
        'user_id' => mt_rand(1,12),
        'published' => mt_rand(0,1),
        'created_at' => $faker->dateTimeBetween('-1 years', '+1 years'),
        'updated_at' => $faker->dateTimeBetween('+0 days', '+2 years')
    ];
});
