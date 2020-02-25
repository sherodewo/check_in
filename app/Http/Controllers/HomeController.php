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
        $cities = $this->cityModel->all();

        if (Auth::user()->user_role->role_id == 3){
            return view('frontend.home.index',compact('cities'));

        }else{
            return view('admin.layouts.app');

        }

    }
}
