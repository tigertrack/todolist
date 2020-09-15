<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'name' => $this->faker->words($nb = 3, $asText = true) 
    ];
});
