<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{

    public function __construct()
    {
        $this->model        = new City();
        $this->provinceModel = new Province();
    }

    public function dataTables()
    {
        $data = $this->model->sql()->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('city.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('city.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('city.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = $this->provinceModel->all();
        return view('admin.backend.cities.create', compact('provinces'));
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'province' => 'required',
            ]);

        $data = $this->model;
        $data->name = $request->name;
        $data->province_id = $request->province;
        $data->save();

        return redirect('/city')->with('success', 'City has been created');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = $this->model->sql()->findOrFail($id);
        return view('admin.backend.cities.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $city = new City();
        $data = $city->findOrFail($id);
        $provinces = $this->provinceModel->all();
        return view('admin.backend.cities.edit',compact('data', 'provinces'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $city = new City();
        $data = $city->findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'province' => 'required'
        ]);
        $data->update($request->all());
        return redirect('/city')->with('success', 'City has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = City::find($id);
        $data->delete();

        return redirect('/city')->with('success', 'City has been Delete');
    }

    public function getByProvinceId(Request $request)
    {
        $cities = City::where('province_id', $request->province_id)->get();
        return response()->json(json_encode($cities), 200);
    }
}
