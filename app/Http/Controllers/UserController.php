<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    //
    public function login ()
    {
      return view('login');
    }

    public function create ()
    {
      $roles=Role::all();
      return view('register',compact('roles'));
    }


    public function projects ()
    {
      return view('dashboard');
    }

    public function getData(){
      $roles = Role::select(['id','name'])->get();
      return Datatables::of($roles)->make(true);
    }






    public function store ()
    {
      /*
      $user= new User();
      $user->name= request('name');
      $user->last_name=request('last_name');
      $user->email=request('email');
      $user->password=request('password');
      $user->role_id=2;
      $user->remember_token=request('_token');
      $user->save();
      */
      $t=2;
      if ($t == 2)
      {
        return redirect('/dashboard');
      }
      else
      {
        return redirect('/register');
      }
}
}
