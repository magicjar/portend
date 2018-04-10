<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(7, 11),
        'content' => $faker->paragraphs(rand(12, 16), true),
        'image' => '1',
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Resume::class, function (Faker $faker) {
    return [
        'name' => 'Senior High School',
        'description' => $faker->sentence(7, 11),
        'institution' => $faker->sentence(5, 8),
        'date_start' => '2017',
        'date_end' => '2018',
        'resume_type' => $faker->randomElement(['education', 'experience'])
    ];
});

$factory->define(App\Testimonial::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6, 10),
        'content' => $faker->sentence(15, 18),
        'author' => $faker->name(),
        'image' => $faker->imageUrl(),
        'url' => $faker->url()
    ];
});