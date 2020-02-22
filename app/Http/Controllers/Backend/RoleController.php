<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function dataTables()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('role.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('role.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('role.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.roles.create');
    }

    /**
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $this->model;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();

        return redirect('/role')->with('success', 'Role has been created');
    }

    /**
     * @param Role $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $role = new Role();
        $data = $role->findOrFail($id);
        return view('admin.backend.roles.show',compact('data'));
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = new Role();
        $data = $role->findOrFail($id);
        return view('admin.backend.roles.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param Role $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $role = new Role();
        $data = $role->findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'description|min:255'
        ]);
        $data->update($request->all());
        return redirect('/role')->with('success', 'role has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Role::find($id);
        $data->delete();

        return redirect('/role')->with('success', 'role has been Delete');
    }
}
