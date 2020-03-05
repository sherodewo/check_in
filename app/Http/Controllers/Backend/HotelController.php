<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Hotel();
    }

    public function dataTable()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('hotel.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('hotel.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('hotel.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request, $id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }

    public function destroy($id)
    {

    }
}
