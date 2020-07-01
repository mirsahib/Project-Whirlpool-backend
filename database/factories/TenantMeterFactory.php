<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


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

$factory->define(App\MotherMeter::class, function (Faker $faker) {
    return [
        //
        'meter_number'=>$faker->ean8,
        'assign_hrid'=>$faker->ean8,
        'type'=> $faker->randomElement(['Mother Meter','Sub Meter']),
        'consume_unit'=>$faker->numberBetween($min = 100, $max = 300),
        'bill_amount'=>$faker->numberBetween($min = 1000, $max = 3000),
        'year'=>$faker->year($max = 'now'),
        'month'=>$faker->month($max = 'now'),
        'pay_status'=>$faker->randomElement(['Paid','Not Paid'])

    ];
});
$factory->define(App\SubMeter::class, function (Faker $faker) {
    return [
        //
        'prev_reading'=>$faker->numberBetween($min = 1000, $max = 3000),
        'curr_reading'=>$faker->numberBetween($min = 3000, $max = 4000),
        'consume_unit'=>$faker->numberBetween($min = 100, $max = 300),
        'bill_amount'=>$faker->numberBetween($min = 2000, $max = 3000),
        'year'=>$faker->year($max = 'now'),
        'month'=>$faker->year($max = 'now'),
        'pay_status'=>$faker->randomElement(['Paid','Not Paid'])
    ];
});
