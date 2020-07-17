<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    public function index(){
        //SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id
        $paid = DB::select(DB::raw("SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id AND payments.pay_status=:status"),array('status'=>1));
        $unPaid = DB::select(DB::raw("SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id AND payments.pay_status=:status"),array('status'=>0));

        return response()->json(['paid'=>$paid,'unpaid'=>$unPaid]);

    }

    public function edit($id){
        //$payment = ;

    }

    public function update(Request $request,$id){
        return 'update working';
    }

    public function paid(){
        $paid = DB::select(DB::raw("SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id AND payments.pay_status=:status"),array('status'=>1));
        return response()->json(['paid'=>$paid]);

    }

    public function unpaid(){
        $unPaid = DB::select(DB::raw("SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id AND payments.pay_status=:status"),array('status'=>0));
        return response()->json(['unpaid'=>$unPaid]);

    }
}
