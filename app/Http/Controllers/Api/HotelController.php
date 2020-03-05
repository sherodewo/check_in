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
            $data->description = $request->description;
            $data->room_type_id = $request->room_type_id;
            $data->city_id = $request->city_id;
            $data->facility_id = $request->facility_id;
            $data->hotel_stars = $request->hotel_stars;
            $data->number_of_rooms = $request->number_of_rooms;
            $data->price = $request->price;
            $data->image = $request->image;
            $data->hotel_owner_id = $request->hotel_owner_id;
            $data->status = $request->status;
            $data->save();

            $response = $this->apiBaseResponse->singleData(["name" => $data->name,"description" => $data->desctiption,"room_type_id" => $data->room_type_id,
                "city_id" => $data->city_id,"facility_id" => $data->facility_id,"hotel_stars" => $data->hotel_stars,"number_of_rooms" => $data->number_of_rooms,
                "price" =>  $data->price,"image" => $data->image,"hotel_owner_id" => $data->hotel_owner_id,"status" => $data->status], []);

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
            $data->description = $request->description;
            $data->room_type_id = $request->room_type_id;
            $data->city_id = $request->city_id;
            $data->facility_id = $request->facility_id;
            $data->hotel_stars = $request->hotel_stars;
            $data->number_of_rooms = $request->number_of_rooms;
            $data->price = $request->price;
            $data->image = $request->image;
            $data->hotel_owner_id = $request->hotel_owner_id;
            $data->status = $request->status;
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
