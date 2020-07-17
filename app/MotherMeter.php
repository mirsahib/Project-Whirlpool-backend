<?php

namespace App;
use App\SubMeter;

use Illuminate\Database\Eloquent\Model;

class MotherMeter extends Model
{
    //
    protected $fillable = ['meter_num','type','consume_unit','bill','year','month'];

    public function sub_meters(){
        return $this->hasMany(SubMeter::class);
    }
}
