<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\v1\role\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'role_name' => $faker->unique()->randomElement(['Owner', 'Landlord', 'Tenant'])
    ];
});
