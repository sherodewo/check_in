<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HotelController extends Controller
{
    private $model;
    private $cities;
    private $facilities;
    private $roomtype;

    public function __construct()
    {
        $this->model = new Hotel();
        $this->cities = new City();
        $this->facilities = new Facility();
        $this->roomtype = new RoomType();
    }

    public function dataTables()
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
        return view('admin.backend.hotels.index');
    }

    public function show($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.hotels.show',compact('data'));
    }

    public function create()
    {
        $cities = $this->cities->all();
        $roomtype = $this->roomtype->all();
        $facilities = $this->facilities->all();
        return view('admin.backend.hotels.create', compact('cities','facilities', 'roomtype'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('image'))
        {

            $data = $this->model;
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $img[] = $name;
            }

            $data->image = json_encode($img);

            $data->save();

            return redirect('/hotel')->with('success', 'Hotel has been successfully');
        }
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.hotels.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);

    }

    public function delete($id)
    {
        $data = $this->model->findOrFail($id);

    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();

        return redirect('/hotel')->with('success', 'Province has been Delete');
    }
}
