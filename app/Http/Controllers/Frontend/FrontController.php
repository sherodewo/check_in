<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->cityModel = new City();
    }

    public function index(){
        $cities = $this->cityModel->all();
        return view('frontend.home.index',compact('cities'));

    }

}
