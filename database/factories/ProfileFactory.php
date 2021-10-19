<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $unixTimestamp = '1461067200';
    $users = User::all()->pluck('id')->toArray();
    return [
        "user_id" => $faker->unique()->numberBetween($min = 1, $max = 100),
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
        "dob" =>date('Y-m-d', $unixTimestamp)  ,
        "gender" => $faker->randomElement(['male', 'female']),
        "contact_no" => $faker->numerify('07########')

    ];
});
