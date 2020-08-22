<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Foo;
use Faker\Generator as Faker;

$factory->define(Foo::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'data' => $faker->word,
        'confirmed' => $faker->word,
        'name' => $faker->word,
        'date' => $faker->word,
        'date_time' => $faker->date('Y-m-d H:i:s')
    ];
});
