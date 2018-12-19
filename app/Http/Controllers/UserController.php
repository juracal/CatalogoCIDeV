<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    //Autenticar Usuario
    public function login ()
    {
      return view('login');
    }

    public function authenticate()
    {

      $username=request('username');
      $password=request('password');
      $user = User::where('email', '=', $username)->firstOrFail();

      if ($user->password==$password) {

        return redirect("/user/".(string)$user->id."/proyectos");
      }else{
        return view('/login');
      }
    }


//-----------------------------------------------------------------------------------------------

    public function projects ($id)
    {
      $user= User::find($id);
      return view('dashboard',compact('user'));
    }

    public function getData(){
      $roles = Role::select(['id','name'])->get();
      return Datatables::of($roles)
      -> addColumn('action', function () {
                 return '
                 <a>Ver</a>
                 <a>Editar</a>
                 <a>Eliminar</a>';})

      ->make(true);

    }

    public function getProyectos()
    {
      return view('dashboard');
    }
//----------------------------------------------------------------------------------
//Get-Post para el registro

  //Carga la página de registro
  public function createUser ()
  {
    $roles=Role::all();
    return view('register',compact('roles'));
  }

  //Inserta el usuario
    public function storeUser ()
    {

      $user= new User();
      $user->name= request('name');
      $user->last_name=request('last_name');
      $user->email=request('email');
      $user->password=request('password');
      $role = Role::where('name', request('rls'))->first()->id;
      $user->role_id= $role;
      $user->remember_token=request('_token');
      $user->save();
      $id=$user->id;
      if ($role == 2)
      {
        return redirect("/user/".(string)$id."/proyectos");
      }
      else
      {
        return redirect('/create');
      }
}
//------------------------------------------------------------------------------------


//Obtener la información de un usario
public function getInfo ($id)

{
     $user = User::find($id);
     if (!$user) return abort(404);
     return view('/edit',compact('user'));
}


public function logout(){
  Auth::logout();
  return redirect('/login');
}

//------------------------------------------------------------------------------------
//Actualizar la información de un usuario
public function update (Request $request, $id)
{
  $user= User::find($id);

  if($request->hasFile('avatar'))
  {
    $user->image= $request-> file('avatar')->store('public');
  }

  $user->update($request->only('name','last_name','description','email','avatar'));
  return redirect("/user/".(string)$id."/proyectos");

}

}
