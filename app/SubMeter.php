<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMeter extends Model
{
    //
    protected $fillable = ['meter_number','rid','type','prev_reading','curr_reading','consume_unit','bill_amount','year','month','pay_status'];
}
