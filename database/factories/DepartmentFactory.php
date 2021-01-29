<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'department_name' => $faker->name,
        'department_phone' => '0' . $faker->unique()->randomNumber(9),
        'department_number_person' => $faker->randomNumber(2),
        'department_note' => $faker->address,
        'created_by' => 'SYSTEM',
        'updated_by' => 'SYSTEM',
    ];
});
