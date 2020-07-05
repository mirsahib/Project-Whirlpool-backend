<?php

namespace App\Http\Controllers;
use App\SubMeter;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class SubMeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sub_meter = SubMeter::all();
        return response()->json(['sub_meters'=>$sub_meter]);

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
            "mother_meter_id" =>  'required',
            "prev_reading" => 'required',
            "curr_reading" =>  'required',
            "consume_unit" => 'required',
            "bill" => 'required',
            "year" => 'required',
            "month" => 'required',
            "pay_stat" => 'required',
        ]);
        if($validateData->fails()){
            return response()->json([
                'message'=>'Invalid input'
            ]);
        }else{
            $sub_meter = new SubMeter;
            $sub_meter->mother_meter_id = $request->mother_meter_id;
            $sub_meter->prev_reading = $request->prev_reading;
            $sub_meter->curr_reading = $request->curr_reading;
            $sub_meter->consume_unit = $request->consume_unit;
            $sub_meter->bill = $request->bill;
            $sub_meter->year = $request->year ;
            $sub_meter->month = $request->month;
            $sub_meter->pay_stat = $request->pay_stat;
            $sub_meter->save();
            return response()->json([
                'message'=>'Sub Meter  Created Successfully','tenant'=>$sub_meter
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
        $sub_meter = SubMeter::find($id);
        if($sub_meter){
            return response()->json(['sub_meter'=>$sub_meter]);
        }else{
            return response()->json(['msg'=>'Something went wrong','sub_meter'=>$sub_meter]);
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
        $sub_meter = SubMeter::find($id);
        if($sub_meter){
            return response()->json(['sub_meter'=>$sub_meter]);
        }else{
            return response()->json(['msg'=>'Something went wrong','sub_meter'=>$sub_meter]);
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
            "mother_meter_id" =>  'required',
            "prev_reading" => 'required',
            "curr_reading" =>  'required',
            "consume_unit" => 'required',
            "bill" => 'required',
            "year" => 'required',
            "month" => 'required',
            "pay_stat" => 'required',
        ]);
        if($validateData->fails()){
            return response()->json([
                'message'=>'Invalid input'
            ]);
        }else{
            $sub_meter = SubMeter::find($id);
            $sub_meter->mother_meter_id = $request->mother_meter_id;
            $sub_meter->prev_reading = $request->prev_reading;
            $sub_meter->curr_reading = $request->curr_reading;
            $sub_meter->consume_unit = $request->consume_unit;
            $sub_meter->bill = $request->bill;
            $sub_meter->year = $request->year ;
            $sub_meter->month = $request->month;
            $sub_meter->pay_stat = $request->pay_stat;
            $sub_meter->save();
            return response()->json([
                'message'=>'Sub Meter Updated Successfully','sub_meter'=>$sub_meter
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
        $sub_meter = SubMeter::find($id);
        if($sub_meter){
            $sub_meter->delete();
            return response()->json(['msg'=>'Item Deleted Successfully','company',$sub_meter]);
        }else{
            return response()->json(['msg'=>'Item doesn\'t exit','company',$sub_meter]);
        }
    }
}
