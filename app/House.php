<?php

namespace App;

use App\Tenant;
use App\MotherMeter;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //
    public function tenants(){
        return $this->hasOne(Tenant::class);
    }
    public function motherMeter(){
        return $this->hasOne(MotherMeter::class);
    }
}
