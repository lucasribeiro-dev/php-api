<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Users;
use App\Models\States;
use App\Models\Citys;
use App\Models\Address;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(States::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
    ];
});

$factory->define(Citys::class, function (Faker $faker) {
    $last_id = States::get()->last()['id'];
    $first_id =  States::get()->first()['id'];
    return [
        'name' => $faker->city,
        'state_id' => random_int($first_id, $last_id)
    ];
});

$factory->define(Users::class, function (Faker $faker) {
    $last_id = Citys::get()->last()['id'];
    $first_id =  Citys::get()->first()['id'];
    $city_id = random_int($first_id, $last_id);
    return [
        'name' => $faker->name,
        'city_id' => $city_id,
        'state_id' => Citys::get()->find($city_id)['state_id']
    ];
});

$factory->define(Address::class, function (Faker $faker) {
    $last_id = Users::get()->last()['id'];
    $first_id =  Users::get()->first()['id'];
    return [
        'name' => $faker->address,
        'user_id' => random_int($first_id, $last_id)
    ];
});
