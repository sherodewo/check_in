<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FacilityController extends Controller
{
    private $facility;

    public function __construct(Facility $facility)
    {
        $this->model = $facility;
    }

    public function dataTables()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('facility.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('facility.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('facility.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.facilities.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.facilities.create');
    }

    /**
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $this->model;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect('/facility')->with('success', 'Facility has been created');
    }

    /**
     * @param Role $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.facilities.show',compact('data'));
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.facilities.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param Role $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'description|min:255'
        ]);
        $data->update($request->all());
        return redirect('/facility')->with('success', 'facility has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Facility::find($id);
        $data->delete();

        return redirect('/facility')->with('success', 'facility has been Delete');
    }
}
