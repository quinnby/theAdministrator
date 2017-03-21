<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'birthDate' => $faker->date,
        'hireDate' => $faker->date,
        'address' => $faker->streetAddress,
        'city' => 'Oshawa',
        'postalCode' => 'L1L1L1',
        'province' => 'ON',
        'sinNumber' => '111-111-111',
        'primaryPhone' => '(555)555-5555',
        'secondaryPhone' => '(555)222-2222',
        'titleId' => rand(1, 10),
        'departmentId' => rand(1, 14),
        'userTypeId' =>rand(2, 3),
        
    ];
});
