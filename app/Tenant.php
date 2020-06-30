<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MotherMeter;

class Tenant extends Model
{
    //
    protected $fillable = ['name', 'nid','nid_img','phone','exp_rent','paid_rent','dues','pay_date','comment','hrid','status','exit'];

    public function mother_meter(){
        return $this->hasOne(MotherMeter::class);
    }

}
