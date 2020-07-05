<?php

namespace App\Http\Controllers;
use App\MotherMeter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MotherMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mother_meter = MotherMeter::all();
        return response()->json(['mother_meters'=>$mother_meter]);
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
            'tenant_id'=>'required',
            'meter_num'=>'required',
            'type'=>'required',
            'consume_unit'=>'required',
            'bill'=>'required',
            'year'=>'required',
            'month'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json([
                'message'=>'Invalid input'
            ]);
        }else{
            $mother_meter = new MotherMeter;
            $mother_meter->tenant_id = $request->tenant_id;
            $mother_meter->meter_num = $request->meter_num;
            $mother_meter->type = $request->type;
            $mother_meter->consume_unit = $request->consume_unit;
            $mother_meter->bill = $request->bill;
            $mother_meter->year = $request->year ;
            $mother_meter->month = $request->month;
            $mother_meter->save();
            return response()->json([
                'message'=>'Mother Meter  Created Successfully','tenant'=>$mother_meter
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
        $mother_meter = MotherMeter::find($id);
        if($mother_meter){
            return response()->json(['mother_meter'=>$mother_meter]);
        }else{
            return response()->json(['msg'=>'Something went wrong','mother_meter'=>$mother_meter]);
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
        $mother_meter = MotherMeter::find($id);
        if($mother_meter){
            return response()->json(['mother_meter'=>$mother_meter]);
        }else{
            return response()->json(['msg'=>'Something went wrong','mother_meter'=>$mother_meter]);
        }
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
            'tenant_id'=>'required',
            'meter_num'=>'required',
            'type'=>'required',
            'consume_unit'=>'required',
            'bill'=>'required',
            'year'=>'required',
            'month'=>'required',
        ]);
        if($validateData->fails()){
            return response()->json([
                'message'=>'Invalid input'
            ]);
        }else{
            $mother_meter = MotherMeter::find($id);
            $mother_meter->tenant_id = $request->tenant_id;
            $mother_meter->meter_num = $request->meter_num;
            $mother_meter->type = $request->type;
            $mother_meter->consume_unit = $request->consume_unit;
            $mother_meter->bill = $request->bill;
            $mother_meter->year = $request->year ;
            $mother_meter->month = $request->month;
            $mother_meter->save();
            return response()->json([
                'message'=>'Mother Meter Updated Successfully','mother_meter'=>$mother_meter
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
        $mother_meter = MotherMeter::find($id);
        if($mother_meter){
            $mother_meter->delete();
            return response()->json(['msg'=>'Item Deleted Successfully','company',$mother_meter]);
        }else{
            return response()->json(['msg'=>'Item doesn\'t exit','company',$mother_meter]);
        }
    }
}
