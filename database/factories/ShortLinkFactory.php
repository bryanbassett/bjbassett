<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShortLink;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ShortLink::class, function (Faker $faker) {
    return [
        'slug' => $faker->word,
        'link' => $faker->url,
    ];
});
