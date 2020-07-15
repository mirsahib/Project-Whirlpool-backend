<?php

namespace App\Http\Controllers;

use App\Tenant;
use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
        //$tenants = Tenant::all();

        $tenants = DB::select(DB::raw("SELECT * from houses,tenants where houses.id=tenants.house_id"));//this is bad query
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
            //'nid_img'=>'required',
            'phone'=>'required',
            'exp_rent'=>'required',
            'reg_date' =>'required',
            //'paid_rent'=>'required',
            //'dues'=>'required',
            //'pay_date'=>'required',
            //'comment'=>'required',
            'house_id'=>'required',
            //'status'=>'required',
            //'exit_date'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json(["message"=>$validateData->messages()], 404);
        }else{
            $tenant = new Tenant;
            $house  = House::find($request->house_id);
            if($request->nid_img){
                $tenant->name = $request->name;
                $tenant->nid = $request->nid;
                $tenant->nid_img = $request->nid_img;
                $tenant->phone = $request->phone;
                $tenant->exp_rent = $request->exp_rent;
                $tenant->reg_date = $request->reg_date;
                $tenant->house_id = $request->house_id;

                //$tenant->house_id = $house->id;
                //$tenant->house()->associate($house);

                $tenant->save();
                return response()->json([
                    'message'=>'Tenant Created Successfully','tenant'=>$tenant
                ]);
            }else{
                $tenant->name = $request->name;
                $tenant->nid = $request->nid;
                $tenant->phone = $request->phone;
                $tenant->exp_rent = $request->exp_rent;
                $tenant->reg_date = $request->reg_date;
                $tenant->house_id = $request->house_id;
                $tenant->house_id = $request->house_id;
                //$tenant->house_id = $house->id;
                //$tenant->house()->associate($house);
                $tenant->save();
                return response()->json([
                    'message'=>'Tenant Created Successfully','tenant'=>$tenant
                ]);
            }
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

        $tenant = DB::select(DB::raw("SELECT * from houses,tenants where tenants.id=:id AND houses.id=tenants.house_id"),array(
            'id'=>$id
        ));
        //$tenant = Tenant::find($id);
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
            //'nid_img'=>'required',
            'phone'=>'required',
            'exp_rent'=>'required',
            'reg_date' =>'required',
            //'paid_rent'=>'required',
            //'dues'=>'required',
            //'pay_date'=>'required',
            //'comment'=>'required',
            'house_id'=>'required',
            //'status'=>'required',
            //'exit_date'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json(["message"=>$validateData->messages()], 404);
        }else{
            $tenant = new Tenant;
            $house  = House::find($request->house_id);
            if($request->nid_img){
                $tenant->name = $request->name;
                $tenant->nid = $request->nid;
                $tenant->nid_img = $request->nid_img;
                $tenant->phone = $request->phone;
                $tenant->exp_rent = $request->exp_rent;
                $tenant->reg_date = $request->reg_date;
                $tenant->house_id = $request->house_id;
                //$tenant->house_id = $house->id;
                $tenant->save();
                return response()->json([
                    'message'=>'Tenant Created Successfully','tenant'=>$tenant
                ]);
            }else{
                $tenant->name = $request->name;
                $tenant->nid = $request->nid;
                $tenant->phone = $request->phone;
                $tenant->exp_rent = $request->exp_rent;
                $tenant->reg_date = $request->reg_date;
                $tenant->house_id = $request->house_id;
                $tenant->house_id = $request->house_id;
                //$tenant->house_id = $house->id;
                $tenant->save();
                return response()->json([
                    'message'=>'Tenant Created Successfully','tenant'=>$tenant
                ]);
            }
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
            return response()->json(['message'=>'Tenant Deleted Successfully','company',$tenant]);
        }else{
            return response()->json(['message'=>'Tenant doesn\'t exit','company',$tenant]);
        }

    }
}
