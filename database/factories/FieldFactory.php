<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Field;
use Faker\Generator as Faker;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'cat_id' => $faker->numberBetween(1,5),
    ];
});
