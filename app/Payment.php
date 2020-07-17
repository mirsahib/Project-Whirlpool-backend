<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['tenant_id','exp_rent','paid_rent','dues','pay_month','pay_year','pay_status'];
}
