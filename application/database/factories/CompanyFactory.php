<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->domainName
    ];
});
