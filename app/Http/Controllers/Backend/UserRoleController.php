<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class UserRoleController extends Controller
{
    private $userRole;

    public function __construct(UserRole $userRole)
    {
        $this->model = $userRole;
    }

    public function dataTables()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('userrole.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('userrole.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('userrole.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.userroles.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $role = Role::all();
        return view('admin.backend.userroles.create', compact('user', 'role'));
    }

    /**
     * @param CreateUserRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $data = $this->model;
        $data->user_id = $request->user_id;
        $data->role_id = $request->role_id;
        $data->save();

        return redirect('/userrole')->with('success', 'User Role has been created');
    }

    /**
     * @param User Role $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $userRole = new UserRole();
        $data = $userRole->findOrFail($id);
        return view('admin.backend.userroles.show',compact('data'));
    }

    /**
     * @param User Role $userRole
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $user = User::all();
        $role = Role::all();
        $userRole = new UserRole();
        $data = $userRole->findOrFail($id);
        return view('admin.backend.userroles.edit',compact('data', 'user', 'role'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $userRole = new UserRole();
        $data = $userRole->findOrFail($id);
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required'
        ]);
        $data->update($request->all());
        return redirect('/userrole')->with('success', 'User Role has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = UserRole::find($id);
        $data->delete();

        return redirect('/userrole')->with('success', 'User Role has been Delete');
    }
}
