<?php

namespace App;
use App\House;
use App\Payment;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = ['name','nid','nid_img','phone','exp_rent','paid_rent',
                            'dues','pay_date','comment','status','exit_date'];


                            

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    
}
