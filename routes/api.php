<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');


Route::resource('tenants', 'TenantController');
Route::resource('mm', 'MotherMeterController');
Route::resource('sm', 'SubMeterController');
Route::get('houses/vacant', 'HouseController@vacant');
Route::resource('houses', 'HouseController');

