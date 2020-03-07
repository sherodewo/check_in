<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
##RoomType
Route::get('roomtype', 'Api\RoomTypeController@index');
Route::post('roomtype', 'Api\RoomTypeController@create');
Route::put('/roomtype/{id}', 'Api\RoomTypeController@update');
Route::delete('/roomtype/{id}', 'Api\RoomTypeController@delete');

##Hotel

Route::get('hotel', 'Api\HotelController@index');
Route::post('hotel', 'Api\HotelController@create');
Route::put('/hotel/{id}', 'Api\HotelController@update');
Route::delete('/hotel/{id}', 'Api\HotelController@delete');