<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Client\CityClient;
use App\Http\Client\ProvinceClient;
use App\Http\Controllers\Controller;
use App\Models\City;

class FrontController extends Controller
{
    private $provinceClient;
    private $cityClient;

    public function __construct(ProvinceClient $provinceClient,
                                CityClient $cityClient)
    {
        $this->provinceClient = $provinceClient;
        $this->cityClient = $cityClient;
        $this->city = new City();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $cities = $this->city->all();
        return view('frontend.home.index',compact('cities'));
    }

    public function login(){
        return view('frontend.home.login');
    }

    public function register(){
        return view('frontend.home.register');
    }


}
