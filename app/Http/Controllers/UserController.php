<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Tag;
use App\Game;
use App\Image;

use App\Archive;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;


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
        Auth::login($user);

        return redirect("/user/".(string)$user->id."/proyectos");

      }else{
        return view('login');
      }
    }


//-----------------------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
//Get-Post para el registro

  //Carga la página de registro
  public function createUser ()
  {
    if(Auth::user()){
    $roles=Role::all();
    return view('register',compact('roles'));
  }
  else{
    return view('/login');
  }
  }

  //Inserta el usuario
    public function storeUser (Request $request)
    {

      $user = new User();
      $user->name= request('username');
      $user->last_name=request('last_name');
      $user->email=request('email');
      $user->password=request('password');
      $user->description=request('description');
      $user->image= $request-> file('avatar')->store('public');
      $role = Role::where('name', request('rls'))->first()->id;
      $user->role_id= $role;
      $user->hidden= 'True';

      $user->remember_token=request('_token');
      $user->save();
      $id_new=$user->id;
      if ($role == 1 and Auth::user())
      {
        return redirect("/user/".(string)$id_new."/proyectos");
      }
      if ($role == 2 and Auth::user())
      {
        return redirect("/user/".(string)$id_new."/proyectos");
      }
}
//------------------------------------------------------------------------------------


//Obtener la información de un usario
public function getInfo ($id)

{
     $user = User::find($id);
     $roles = Role::all();
     if (!$user) return abort(404);
     return view('/edit',compact('user','roles'));
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
  $role = Role::where('name', request('rls'))->first()->id;


  $user->update($request->only('name','last_name','description','email','avatar',$role));
  return redirect("/user/".(string)$id."/proyectos");

}




public function getUsersView($id){
  if (Auth::user()){
  $user=User::find($id);
  return view('allUsers',compact('user'));
}
else{
  return view('/login');
}
}

public function getUsers(){
  $users = User::select(['id','name','last_name','email','role_id'])->where('hidden','True')->get();
  return Datatables::of($users)
  -> addColumn('action', function () {
             return; })


  ->make(true);
}

public function deleteUser($id){

  $user = User::find($id);
  $user->hidden = 'False';
  $user->save();
  return redirect("/user/".(string)$id."/usuarios");
}








}
