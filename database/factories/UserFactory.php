<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Tenant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

//protected $fillable = ['name', 'nid','nid_img','phone','exp_rent','paid_rent','dues','pay_date','comment','hrid','status','exit'];


$factory->define(App\Tenant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nid' => $faker->ean13,
        'nid_img' => $faker->imageUrl($width = 640, $height = 480),
        'phone' => $faker->phoneNumber,
        'exp_rent' => $faker->numberBetween($min = 1000, $max = 3000),
        'paid_rent' => $faker->numberBetween($min = 1000, $max = 3000),
        'dues' => $faker->numberBetween($min = 1000, $max = 3000),
        'pay_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'comment' =>$faker->text,
        'hrid' => $faker->ean8,
        'status' => $faker->boolean(1),
        'exit' => $faker->date($format = 'Y-m-d', $max = 'now'),

    ];
});
