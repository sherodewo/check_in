<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['middleware' => 'auth'],function () {
    Route::get('/home', 'HomeController@index')->name('home');


    # RoleController
    Route::get('role', ['as' => 'role.index', 'uses' => 'Backend\RoleController@index']);
    Route::get('role/datatables', ['as' => 'role.datatables', 'uses' => 'Backend\RoleController@dataTables']);
    Route::get('role/show/{id}', ['as' => 'role.show', 'uses' => 'Backend\RoleController@show']);
    Route::get('role/create', ['as' => 'role.create', 'uses' => 'Backend\RoleController@create']);
    Route::post('role/create', ['as' => 'role.store', 'uses' => 'Backend\RoleController@store']);
    Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'Backend\RoleController@edit']);
    Route::put('role/update/{id}', ['as' => 'role.update', 'uses' => 'Backend\RoleController@update']);
    Route::get('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'Backend\RoleController@destroy']);
    Route::resource('role', 'Backend\RoleController');

    # UserController
    Route::get('user', ['as' => 'user.index', 'uses' => 'Backend\UserController@index']);
    Route::get('user/datatables', ['as' => 'user.datatables', 'uses' => 'Backend\UserController@dataTables']);
    Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'Backend\UserController@show']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'Backend\UserController@create']);
    Route::post('user/create', ['as' => 'user.store', 'uses' => 'Backend\UserController@store']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'Backend\UserController@edit']);
    Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'Backend\UserController@update']);
    Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'Backend\UserController@destroy']);
    Route::resource('user', 'Backend\UserController');

    # UserRoleController
    Route::get('userrole', ['as' => 'userrole.index', 'uses' => 'Backend\UserRoleController@index']);
    Route::get('userrole/datatables', ['as' => 'userrole.datatables', 'uses' => 'Backend\UserRoleController@dataTables']);
    Route::get('userrole/show/{id}', ['as' => 'userrole.show', 'uses' => 'Backend\UserRoleController@show']);
    Route::get('userrole/create', ['as' => 'userrole.create', 'uses' => 'Backend\UserRoleController@create']);
    Route::post('userrole/create', ['as' => 'userrole.store', 'uses' => 'Backend\UserRoleController@store']);
    Route::get('userrole/edit/{id}', ['as' => 'userrole.edit', 'uses' => 'Backend\UserRoleController@edit']);
    Route::put('userrole/update/{id}', ['as' => 'userrole.update', 'uses' => 'Backend\UserRoleController@update']);
    Route::get('userrole/delete/{id}', ['as' => 'userrole.delete', 'uses' => 'Backend\UserRoleController@destroy']);
    Route::resource('userrole', 'Backend\UserRoleController');

    # ProvinceController
    Route::get('province', ['as' => 'province.index', 'uses' => 'Backend\ProvinceController@index']);
    Route::get('province/datatables', ['as' => 'province.datatables', 'uses' => 'Backend\ProvinceController@dataTables']);
    Route::get('province/show/{id}', ['as' => 'province.show', 'uses' => 'Backend\ProvinceController@show']);
    Route::get('province/create', ['as' => 'province.create', 'uses' => 'Backend\ProvinceController@create']);
    Route::post('province/create', ['as' => 'province.store', 'uses' => 'Backend\ProvinceController@store']);
    Route::get('province/edit/{id}', ['as' => 'province.edit', 'uses' => 'Backend\ProvinceController@edit']);
    Route::put('province/update/{id}', ['as' => 'province.update', 'uses' => 'Backend\ProvinceController@update']);
    Route::get('province/delete/{id}', ['as' => 'province.delete', 'uses' => 'Backend\ProvinceController@destroy']);
    Route::resource('province', 'Backend\ProvinceController');

    # CityController
    Route::get('city', ['as' => 'city.index', 'uses' => 'Backend\CityController@index']);
    Route::get('city/datatables', ['as' => 'city.datatables', 'uses' => 'Backend\CityController@dataTables']);
    Route::get('city/show/{id}', ['as' => 'city.show', 'uses' => 'Backend\CityController@show']);
    Route::get('city/create', ['as' => 'city.create', 'uses' => 'Backend\CityController@create']);
    Route::post('city/create', ['as' => 'city.store', 'uses' => 'Backend\CityController@store']);
    Route::get('city/edit/{id}', ['as' => 'city.edit', 'uses' => 'Backend\CityController@edit']);
    Route::put('city/update/{id}', ['as' => 'city.update', 'uses' => 'Backend\CityController@update']);
    Route::get('city/delete/{id}', ['as' => 'city.delete', 'uses' => 'Backend\CityController@destroy']);
    Route::resource('city', 'Backend\CityController');
    Route::post('cities-by-province-id', ['as' => 'cities.byProvinceId', 'uses' => 'Backend\CityController@getByProvinceId']);

    # DistrictController
    Route::get('district', ['as' => 'district.index', 'uses' => 'Backend\DistrictController@index']);
    Route::get('district/datatables', ['as' => 'district.datatables', 'uses' => 'Backend\DistrictController@dataTables']);
    Route::get('district/show/{id}', ['as' => 'district.show', 'uses' => 'Backend\DistrictController@show']);
    Route::get('district/create', ['as' => 'district.create', 'uses' => 'Backend\DistrictController@create']);
    Route::post('district/create', ['as' => 'district.store', 'uses' => 'Backend\DistrictController@store']);
    Route::get('district/edit/{id}', ['as' => 'district.edit', 'uses' => 'Backend\DistrictController@edit']);
    Route::put('district/update/{id}', ['as' => 'district.update', 'uses' => 'Backend\DistrictController@update']);
    Route::get('district/delete/{id}', ['as' => 'district.delete', 'uses' => 'Backend\DistrictController@destroy']);
    Route::resource('district', 'Backend\DistrictController');

    # ProvinceController
    Route::get('roomtype', ['as' => 'roomtype.index', 'uses' => 'Backend\RoomTypeController@index']);
    Route::get('roomtype/datatables', ['as' => 'roomtype.datatables', 'uses' => 'Backend\RoomTypeController@dataTables']);
    Route::get('roomtype/show/{id}', ['as' => 'roomtype.show', 'uses' => 'Backend\RoomTypeController@show']);
    Route::get('roomtype/create', ['as' => 'roomtype.create', 'uses' => 'Backend\RoomTypeController@create']);
    Route::post('roomtype/create', ['as' => 'roomtype.store', 'uses' => 'Backend\RoomTypeController@store']);
    Route::get('roomtype/edit/{id}', ['as' => 'roomtype.edit', 'uses' => 'Backend\RoomTypeController@edit']);
    Route::put('roomtype/update/{id}', ['as' => 'roomtype.update', 'uses' => 'Backend\RoomTypeController@update']);
    Route::get('roomtype/delete/{id}', ['as' => 'roomtype.delete', 'uses' => 'Backend\RoomTypeController@destroy']);
    Route::resource('roomtype', 'Backend\RoomTypeController');

    # FacilityController
    Route::get('facility', ['as' => 'facility.index', 'uses' => 'Backend\FacilityController@index']);
    Route::get('facility/datatables', ['as' => 'facility.datatables', 'uses' => 'Backend\FacilityController@dataTables']);
    Route::get('facility/show/{id}', ['as' => 'facility.show', 'uses' => 'Backend\FacilityController@show']);
    Route::get('facility/create', ['as' => 'facility.create', 'uses' => 'Backend\FacilityController@create']);
    Route::post('facility/create', ['as' => 'facility.store', 'uses' => 'Backend\FacilityController@store']);
    Route::get('facility/edit/{id}', ['as' => 'facility.edit', 'uses' => 'Backend\FacilityController@edit']);
    Route::put('facility/update/{id}', ['as' => 'facility.update', 'uses' => 'Backend\FacilityController@update']);
    Route::get('facility/delete/{id}', ['as' => 'facility.delete', 'uses' => 'Backend\FacilityController@destroy']);
    Route::resource('facility', 'Backend\FacilityController');
});

// FrontEnd
Route::resource('frontend', 'Frontend\FrontController');

