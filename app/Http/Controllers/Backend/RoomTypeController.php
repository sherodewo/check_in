<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class RoomTypeController extends Controller
{
    public function __construct()
    {
        $this->model = new RoomType();
    }

    public function dataTables()
    {
        $data = $this->model->all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('roomtype.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('roomtype.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('roomtype.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.roomtypes.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.roomtypes.create');
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

        return redirect('/roomtype')->with('success', 'Room Type has been created');
    }

    /**
     * @param User $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $model = new RoomType();
        $data = $model->findOrFail($id);
        return view('admin.backend.roomtypes.show',compact('data'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = new RoomType();
        $data = $model->findOrFail($id);
        return view('admin.backend.roomtypes.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = new RoomType();
        $data = $model->findOrFail($id);
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $data->update($request->all());
        return redirect('/roomtype')->with('success', 'Room Types has been updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = RoomType::find($id);
        $data->delete();

        return redirect('/roomtype')->with('success', 'Room Type has been Delete');
    }
}
