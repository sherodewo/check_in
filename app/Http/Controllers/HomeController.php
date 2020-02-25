<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $cityModel;

    public function __construct()
    {
        $this->middleware('auth');
        $this->cityModel = new City();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->user_role->role->name == "super_admin"){
            return view('admin.layouts.app');
        }else{
            $cities = $this->cityModel->all();
            return view('frontend.home.index',compact('cities'));
        }

    }
}
