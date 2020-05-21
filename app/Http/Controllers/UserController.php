<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function create()
    {
        return view('add-user')->with('roles',Role::all());
    }

    public function store(\App\Http\Requests\StoreUserRequest $request)
    {
        $request->validated();
        try{
            $request['password'] = Hash::make($request->password);
             $user = User::create(array_merge($request->all(), ['index' => 'value']));
             $user->roles()->attach($request->role_id);
        }catch(\Exception $ex){

            Session::flash('message', 'Something went wrong!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        Session::flash('message', 'User added'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
        
    }
}
