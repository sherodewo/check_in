<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->model = new Province();
    }

    public function dataTables()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('province.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('province.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('province.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.provinces.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.provinces.create');
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->name;
        $data->save();

        return redirect('/province')->with('success', 'Province has been created');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $province = new Province();
        $data = $province->findOrFail($id);
        return view('admin.backend.provinces.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $province = new Province();
        $data = $province->findOrFail($id);
        return view('admin.backend.provinces.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $province = new Province();
        $data = $province->findOrFail($id);
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $data->update($request->all());
        return redirect('/province')->with('success', 'Province has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Province::find($id);
        $data->delete();

        return redirect('/province')->with('success', 'Province has been Delete');
    }
}
