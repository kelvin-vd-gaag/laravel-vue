<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gratitude;
use Faker\Generator as Faker;

$factory->define(Gratitude::class, function (Faker $faker) {
    return [
        'content' => $faker->text(20),
        'user_id' => 1
    ];
});
