<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $userModel;
    private $userRole;
    private $cities;
    public function __construct()
    {
        $this->userModel = new User();
        $this->userRole = new UserRole();
        $this->cities = new City();
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $roles = [];
        $role = Role::findOrFail(3);
        $roles[$role->id] = [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $user->roles()->sync($roles);
        $cities = $this->cities->all();
        return view('frontend.home.index',compact('cities'));
    }
}
