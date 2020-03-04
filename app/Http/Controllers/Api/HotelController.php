<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Library\ApiBaseResponse;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private $model;
    private $apiBaseResponse;

    public function __construct()
    {
        $this->model = new Hotel();
        $this->apiBaseResponse = new ApiBaseResponse();
    }

    public function index()
    {
        try{
            $data = $this->model->all();
            $respone = $this->apiBaseResponse->singleData([$data],[]);

            return response($respone);
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function create(Request $request)
    {
        try{
            $data = $this->model;
            $data->name = $request->name;
            $data->name = $request->description;
            $data->name = $request->room_type_id;
            $data->name = $request->city_id;
            $data->name = $request->facility_id;
            $data->name = $request->hotel_stars;
            $data->name = $request->number_of_rooms;
            $data->name = $request->price;
            $data->name = $request->image;
            $data->name = $request->hotel_owner_id;
            $data->name = $request->status;
            $data->save();

            $response = $this->apiBaseResponse->singleData([$data->name, $data->desctiption, $data->room_type_id,
                $data->city_id, $data->facility_id, $data->hotels_stars, $data->number_of_rooms, $data->price,
                $data->image, $data->hotel_owner_id, $data->status], []);

            return response($response);
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function update($id, Request $request)
    {
        try{
            $model =  new Hotel();
            $data = $model->findOrFail($id);
            $data->name = $request->name;
            $data->name = $request->description;
            $data->name = $request->room_type_id;
            $data->name = $request->city_id;
            $data->name = $request->facility_id;
            $data->name = $request->hotel_stars;
            $data->name = $request->number_of_rooms;
            $data->name = $request->price;
            $data->name = $request->image;
            $data->name = $request->hotel_owner_id;
            $data->name = $request->status;
            $data->update();

            $response = $this->apiBaseResponse->singleData([$data->name, $data->desctiption, $data->room_type_id,
                $data->city_id, $data->facility_id, $data->hotels_stars, $data->number_of_rooms, $data->price,
                $data->image, $data->hotel_owner_id, $data->status], []);

            return response($response);
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function delete($id){
        try{
            $data = Hotel::find($id);
            $data->delete();

            $response = $this->apiBaseResponse->successResponse(['delete success'], []);

            return response($response);
        }catch (\Exception $e){
            abort(500);
        }
    }
}
