<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = ['name', 'nid','nid_img','phone','exp_rent','paid_rent','dues','pay_date','comment','hrid','status','exit'];
}
