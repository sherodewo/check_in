<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->provinceModel = new Province();
    }

    public function index(){
        $provinces = $this->provinceModel->all();
        return view('frontend.home.index',compact('provinces'));

    }

}
