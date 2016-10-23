<?php

use App\User;
use App\Models\Company;
use App\Models\Section;
use App\Helpers\Gf;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create Models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Phone::class, function (Faker\Generator $faker) {

    $arrayCompany = Company::all()->pluck('id')->toArray();

    return [
        'prefix' => '260',
        'number' => '4'.$faker->randomNumber(6),
        'phone_type' => $faker->randomElement(['mobile','home','work']),
        'company_id' => $faker->randomElement($arrayCompany),
    ];
});

$factory->define(App\Models\Social::class, function (Faker\Generator $faker) {

    $arrayCompany = Company::all()->pluck('id')->toArray();

    return [
        'social_type' => $faker->randomElement(['facebook','twitter','instagram']),
        'url' => $faker->url,
        'company_id' => $faker->randomElement($arrayCompany),
    ];
});

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {

    $name = $faker->company;

    $userArray = User::all()->pluck('id')->toArray();
    $sectionArray = Section::all()->pluck('id')->toArray();

    $return = [
        'name' => $faker->unique()->company,
        'address' => $faker->streetName,
        'slogan' => $name,
        'url' => $name,
        'logo_status' => $faker->randomElement(['1','0']),
        'description' => $faker->randomElement(['1','0']),
        'email' => $faker->unique()->safeEmail,
        'user_id' => $faker->randomElement($userArray),
        'province_id' => '12',
        'department_id' => '15',
        'section_id' => $faker->randomElement($sectionArray)
    ];

    return $return;
});


