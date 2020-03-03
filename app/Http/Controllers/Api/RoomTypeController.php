<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Library\ApiBaseResponse;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    private $model;
    protected $apiBaseResponse;



    public function __construct()
    {
        $this->model = new RoomType();
        $this->apiBaseResponse = new ApiBaseResponse();

    }

    public function index()
    {

        try{
            $roomType = $this->model->all();
            return $roomType;
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function create(Request $request)
    {
        try{
            $data = $this->model;
            $data->name = $request->name;
            $data->save();
            $response = $this->apiBaseResponse->singleData(['name' => $data->name], []);

            return response($response);
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function update($id, Request $request)
    {
        try{
            $model = new RoomType();
            $data = $model->findOrFail($id);
            $data->update($request->all());
            $response = $this->apiBaseResponse->singleData(['name' => $data->name], []);

            return response($response);
        }catch (\Exception $e){
            abort(500);
        }
    }

    public function delete($id)
    {
        try{
            $data = RoomType::find($id);
            $data->delete();

            $response = $this->apiBaseResponse->singleData(['delete success'], []);

            return response($response);
        }catch (\Exception $e){
            abort(500);
        }
    }
}
