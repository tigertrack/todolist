<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'section_id' => 1,
        'title' => $this->faker->words($nb = 3, $asText = true),
        'description' => $this->faker->words($nb = 6, $asText = true),
    ];
});
