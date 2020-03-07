<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->model        = new District();
        $this->cityModel = new City();
        $this->provinceModel = new Province();
    }

    public function dataTables()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('district.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('district.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('district.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.districts.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = $this->provinceModel->all();
        $cityModel = $this->cityModel->all();
        return view('admin.backend.districts.create', compact('provinces', 'cityModel'));
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->name;
        $data->city_id = $request->city;
        $data->province_id = $request->province;

        $data->save();

        return redirect('/district')->with('success', 'District has been created');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = $this->model->sql()->findOrFail($id);
        return view('admin.backend.districts.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $district = new District();
        $data = $district->findOrFail($id);
        $cities = $this->cityModel->where('province_id', $data->province_id)->get();
        $provinces = $this->provinceModel->all();
        $cityModel = $this->cityModel;
        return view('admin.backend.districts.edit',compact('data','cities', 'provinces', 'cityModel'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $district = new District();
        $data = $district->findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'province' => 'required',
        ]);
        $data->name = $request->name;
        $data->province_id = $request->province;
        $data->update();
        return redirect('/district')->with('success', 'District has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = District::find($id);
        $data->delete();

        return redirect('/district')->with('success', 'District has been Delete');
    }
}
