<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PaymentController extends Controller
{
    //
    public function index(){
        $paid = DB::table('payments')->where('payments.pay_status','=',1)
        ->join('tenants','tenants.id','=','payments.tenant_id')->select('tenants.name',"payments.*")
        ->get();
        $unPaid = DB::table('payments')->where('payments.pay_status','=',0)
        ->join('tenants','tenants.id','=','payments.tenant_id')->select('tenants.name',"payments.*")
        ->get();


        return response()->json(['paid'=>$paid,'unpaid'=>$unPaid]);
        
    }
    public function load_payment(Request $request){
        $validateData = Validator::make($request->all(),[
            'pay_month'=>'required',
            'pay_year'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json(["message"=>$validateData->messages()], 404);
        }else{
            // $tenant = Tenant::where('name',$request->name)->get()->first()->id;
            // $payment = Payment::where('tenant_id',$tenant)->where('pay_month',$request->pay_month)->where('pay_year',$request->pay_year)->get();
            $paid = DB::table('payments')->where([
                ['payments.pay_month','=',$request->pay_month],
                ['payments.pay_year','=',$request->pay_year],
                ['payments.pay_status','=',1]
            ])
            ->join('tenants','tenants.id','=','payments.tenant_id')->select('tenants.name','tenants.exp_rent',"payments.*")
            ->get();
            $unpaid = DB::table('payments')->where([
                ['payments.pay_month','=',$request->pay_month],
                ['payments.pay_year','=',$request->pay_year],
                ['payments.pay_status','=',0]
            ])
            ->join('tenants','tenants.id','=','payments.tenant_id')->select('tenants.name','tenants.exp_rent',"payments.*")
            ->get();
            
            return response()->json(["paid"=>$paid,"unpaid"=>$unpaid] );

        }
    }

    public function create(Request $request){
        $validateData = Validator::make($request->all(),[
            'month'=>'required',
            'year'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json(["message"=>$validateData->messages()], 404);
        }else{
            $tenants = Tenant::where('tenant_status',1)->get();
            foreach($tenants as $tenant){
                $payment = new Payment;
                $payment->tenant_id = $tenant->id;
                $payment->pay_month = $request->month;
                $payment->pay_year = $request->year;
                $payment->save();
            }
            
            return response()->json('success');
        }

    }

    public function update(Request $request,$id){
        $validateData = Validator::make($request->all(),[
            'paid_rent'=>'required',
            'dues'=>'required',
            'pay_status'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json(["message"=>$validateData->messages()], 404);
        }else{
            $payment = Payment::find($id);
            $payment->paid_rent = $request->paid_rent;
            $payment->dues = $request->dues;
            $payment->pay_status = $request->pay_status;
            $payment->save();
            return response()->json(["message"=>"Payment Successful","Payment"=>$payment] );
        }
    }

    public function paid(){
        // $tenants = Tenant::select('name','id')->get();
        // $payment = Payment::where(['tenant_id','=',$tenants->id],['pay_status','=',1])->get();
        $paid = DB::table('payments')->where('payments.pay_status','=',1)
        ->join('tenants','tenants.id','=','payments.tenant_id')->select('tenants.name',"payments.*")
        ->get();

        return response()->json(['paid'=>$paid]);

    }

    public function unpaid(){

        $unPaid = DB::table('payments')->where('payments.pay_status','=',0)
        ->join('tenants','tenants.id','=','payments.tenant_id')->select('tenants.name',"payments.*")
        ->get();
        return response()->json(['unpaid'=>$unPaid]);

    }


    public function search(Request $request){
        $validateData = Validator::make($request->all(),[
            'name'=>'required',
            'pay_month'=>'required',
            'pay_year'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json(["message"=>$validateData->messages()], 404);
        }else{
            $tenant = Tenant::where('name',$request->name)->get()->first()->id;
            $payment = Payment::where('tenant_id',$tenant)->where('pay_month',$request->pay_month)->where('pay_year',$request->pay_year)->get();
            return response()->json(["Record"=>$payment] );

        }
    }
}
