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

    $roles=Role::all();
    return view('register',compact('roles'));

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
      $user->remember_token=request('_token');

      $user->hidden= 'True';



      if (Auth::user())
      {
        $role = Role::where('name', request('rls'))->first()->id;
        $user->role_id= $role;


        if($role == 1){
          $user->save();
        }
        return redirect("/create");
      }
      else
      {
        $user->role_id= 2;
        $user->save();
        $id_new=$user->id;
        Auth::login($user);
        return redirect("/user/".(string)$id_new."/proyectos");
      }





}
//------------------------------------------------------------------------------------


//Obtener la información de un usario
public function getInfo ($id,$usuario)

{

     $user = User::find($usuario);
     $roles = Role::all();
     $id_user= $id;
     if (!$user) return abort(404);
     return view('/edit',compact('id_user','user','roles'));
}


public function logout(){
  Auth::logout();
  return redirect('/login');
}

//------------------------------------------------------------------------------------
//Actualizar la información de un usuario
public function update (Request $request,$id,$usuario)
{
  $user= User::find($usuario);


  if($request->hasFile('avatar'))
  {
    $user->image= $request-> file('avatar')->store('public');
  }

  $role= $user->role_id;
  if($user->role_id == 1){
  $role = Role::where('name', request('rls'))->first()->id;
}


  $user->update($request->only('name','last_name','description','email','avatar',$role));
  return redirect("/user/".$id."/proyectos");

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
