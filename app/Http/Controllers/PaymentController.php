<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    public function index(){
        //SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id
        $payments = DB::select(DB::raw("SELECT tenants.name,payments.* FROM tenants,payments WHERE tenants.id = payments.tenant_id"));
        return response()->json($payments);

    }

    public function edit($id){
        $payment = Payment::find($id);

    }

    public function update(Request $request,$id){
        return 'update working';
    }
}
