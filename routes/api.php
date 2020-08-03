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

Route::post('/register','api\authController@register');
Route::post('/login','api\authController@login');
Route::resource('tenants', 'TenantController')->middleware('auth:api');
Route::resource('mm', 'MotherMeterController');
Route::resource('sm', 'SubMeterController');
Route::get('houses/vacant', 'HouseController@vacant');
Route::resource('houses', 'HouseController');
Route::get('payments','PaymentController@index');
Route::post('payments/create','PaymentController@create');
Route::put('payments/update/{id}','PaymentController@update');
Route::get('payments/paid','PaymentController@paid');
Route::get('payments/unpaid','PaymentController@unpaid');
Route::post('payments/search','PaymentController@search');
Route::post('payments/load','PaymentController@load_payment');


