<?php

namespace App\Http\Controllers;

use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tenants = Tenant::all();
        return response()->json(['tenants'=>$tenants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $validateData = Validator::make($request->all(),[
            'name'=>'required',
            'nid'=>'required',
            'nid_img'=>'required',
            'phone'=>'required',
            'exp_rent'=>'required',
            'paid_rent'=>'required',
            'dues'=>'required',
            'pay_date'=>'required',
            'comment'=>'required',
            'hrid'=>'required',
            'status'=>'required',
            'exit_date'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json([
                'message'=>'Invalid input'
            ]);
        }else{
            $tenant = new Tenant;
            $tenant->name = $request->name;
            $tenant->nid = $request->nid;
            $tenant->nid_img = $request->nid_img;
            $tenant->phone = $request->phone;
            $tenant->exp_rent = $request->exp_rent;
            $tenant->paid_rent = $request->paid_rent;
            $tenant->dues = $request->dues;
            $tenant->pay_date = $request->pay_date;
            $tenant->comment = $request->comment;
            $tenant->hrid = $request->hrid;
            $tenant->status = $request->status;
            $tenant->exit_date = $request->exit_date;
            $tenant->save();
            return response()->json([
                'message'=>'Tenant Created Successfully','tenant'=>$tenant
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $tenant = Tenant::find($id);
        if($tenant){
            return response()->json(['tenant'=>$tenant]);
        }else{
            return response()->json(['msg'=>'Something went wrong','tenant'=>$tenant]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tenant = Tenant::find($id);
        return response()->json(['tenant'=>$tenant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = Validator::make($request->all(),[
            'name'=>'required',
            'nid'=>'required',
            'nid_img'=>'required',
            'phone'=>'required',
            'exp_rent'=>'required',
            'paid_rent'=>'required',
            'dues'=>'required',
            'pay_date'=>'required',
            'comment'=>'required',
            'hrid'=>'required',
            'status'=>'required',
            'exit_date'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json([
                'message'=>'Invalid input'
            ]);
        }else{
            $tenant = Tenant::find($id);
            $tenant->name = $request->name;
            $tenant->nid = $request->nid;
            $tenant->nid_img = $request->nid_img;
            $tenant->phone = $request->phone;
            $tenant->exp_rent = $request->exp_rent;
            $tenant->paid_rent = $request->paid_rent;
            $tenant->dues = $request->dues;
            $tenant->pay_date = $request->pay_date;
            $tenant->comment = $request->comment;
            $tenant->hrid = $request->hrid;
            $tenant->status = $request->status;
            $tenant->exit_date = $request->exit_date;
            $tenant->save();
            return response()->json([
                'message'=>'Tenant Updated Successfully','tenant'=>$tenant
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tenant = Tenant::find($id);
        if($tenant){
            $tenant->delete();
            return response()->json(['msg'=>'Item Deleted Successfully','company',$tenant]);
        }else{
            return response()->json(['msg'=>'Item doesn\'t exit','company',$tenant]);
        }

    }
}
