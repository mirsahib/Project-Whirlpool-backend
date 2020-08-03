<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Tenant;
use Illuminate\Http\Request;
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
        $curr_tenants = DB::table('tenants')->where('tenants.tenant_status','=',1)
        ->join('houses','houses.id','=','tenants.house_id')->select('tenants.*',"houses.hrid")
        ->get();
        $prev_tenants = DB::table('tenants')->where('tenants.tenant_status','=',0)
        ->join('houses','houses.id','=','tenants.house_id')->select('tenants.*',"houses.hrid")
        ->get();
        return response()->json(['curr_tenants'=>$curr_tenants,'prev_tenants'=>$prev_tenants]);

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
