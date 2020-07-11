<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tenant;
use App\MotherMeter;
use App\SubMeter;
use Faker\Generator as Faker;

$factory->define(Tenant::class, function (Faker $faker) {

    return [
        //
        'name'=>$faker->name,
        'nid'=>$faker->ean8,
        'nid_img'=>$faker->imageUrl($width = 640, $height = 480),
        'phone'=>$faker->phoneNumber,
        'exp_rent'=>$faker->numberBetween($min = 1000, $max = 3000),
        'paid_rent'=>$faker->numberBetween($min = 1000, $max = 3000),
        'dues'=>$faker->numberBetween($min = 1000, $max = 1500),
        'reg_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'pay_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'comment'=>$faker->text,
        'hrid'=>$faker->numberBetween($min = 100, $max = 110),
        'status'=>$faker->randomElement(['Exists','Not Exists']),
        'exit_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
$factory->define(MotherMeter::class, function (Faker $faker) {
    return [
        //
        'meter_num'=>$faker->ean8,
        'type'=>$faker->randomElement(['Mother Meter','Sub Meter']),
        'consume_unit'=>$faker->numberBetween($min = 70, $max = 600),
        'bill'=>$faker->numberBetween($min = 1000, $max = 3000),
        'year'=>$faker->year($max = 'now'),
        'month'=>$faker->monthName($max = 'now'),

    ];
});
$factory->define(SubMeter::class, function (Faker $faker) {
    return [
        //
        'prev_reading'=>$faker->numberBetween($min = 1000, $max = 3000),
        'curr_reading'=>$faker->numberBetween($min = 3000, $max = 6000),
        'consume_unit'=>$faker->numberBetween($min = 70, $max = 600),
        'bill'=>$faker->numberBetween($min = 1000, $max = 3000),
        'year'=>$faker->year($max = 'now'),
        'month'=>$faker->monthName($max = 'now'),
        'pay_stat'=>$faker->randomElement(['Paid','Not Paid']),

    ];
});
