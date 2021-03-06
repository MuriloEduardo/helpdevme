<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    $title = $faker->unique()->sentence();
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->paragraph()
    ];
});
