<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\HotelFacility;
use App\Models\HotelImage;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;



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
        $query = \DB::table('hotel')
            ->select(['id', 'name', 'hotel_owner_id', 'updated_at'])
            ->where(function ($query) {
                $owner = Auth::user()->id;
                $query->where('hotel_owner_id', '=', 1);
            });
dd($query);
        return DataTables::of($query)
//            ->addColumn('action', function ($query) {
//                return
//                    '<a href="'.route('hotel.show', $query->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
//                <a href="'.route('hotel.edit', $query->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
//                <a href="'.route('hotel.delete', $query->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
//            })
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
//            'image' => 'required',
//            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $data = new Hotel();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->number_of_rooms = $request->number_of_rooms;

        $data->city_id = $request->city_id;
        $data->room_type_id = $request->room_type_id;

        $data->price = $request->price;
        $data->hotel_stars = $request->hotel_stars;
        $data->location_detail = $request->location_detail;
        $data->postal_code = $request->postal_code;
        $data->phone_number = $request->phone_number;
        $data->hotel_owner_id = Auth::user()->id;
//        $data->status = $request->status;
        if ($request->status == 1){
            $data->status = 1;
        }else{
            $data->status = 0;
        }

        $data->save();

        $files = $request->file('image');
            foreach ($files as $file) {

                $file->store('public/images' );
                $storagePath=\Storage::put('image',$request->file('image'));
                $storage = \Storage::disk('local')->put($storagePath, $file);
                $storageName = basename($storage);
                HotelImage::insert([
                'hotel_id' => $data->id,'url'=>$storageName
            ]);
            }
        $facilities = $request->facility_id;
        foreach ($facilities as $facility){
            HotelFacility::insert([
                'hotel_id'=>$data->id, 'facility_id'=>$facility
            ]);

        }
        return redirect('/hotel')->with('success', 'Hotel has been successfully');

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
