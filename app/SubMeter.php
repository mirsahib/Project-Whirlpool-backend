<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMeter extends Model
{
    //

    protected $fillable = ['prev_reading','curr_reading','consume_unit','bill','year','month','pay_stat'];
}
