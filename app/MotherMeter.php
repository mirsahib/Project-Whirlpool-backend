<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SubMeter;

class MotherMeter extends Model
{
    //

    protected $fillable = ['meter_number','hrid','type','consume_unit','bill_amount','year','month','pay_status'];
    
    public function sub_meters(){
        return $this->hasMany(SubMeter::class);
    }
}
