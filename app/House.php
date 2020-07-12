<?php

namespace App;

use App\Tenant;
use App\motherMeter;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //
    public function tenant(){
        return $this->hasOne(Tenant::class);
    }
    public function motherMeter(){
        return $this->hasOne(MotherMeter::class);
    }
}
