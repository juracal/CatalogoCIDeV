<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;
use App\Tag;


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

    public function getProyectos($id)
    {

      $tags=Tag::all();
      $user=User::find($id);
      return view('registerGame',compact('tags','user'));
    }
//----------------------------------------------------------------------------------

    public function store ()
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

public function getInfo ($id)

{


     $user = User::find($id);
     if (!$user) return abort(404);
     return view('/edit',compact('user'));


}



public function update (Request $request, $id)
{

  $user= User::find($id);


  if($request->hasFile('avatar'))
  {
    $user->image= $request-> file('avatar')->store('public');
  }

  $user->update($request->only('name','last_name','description','email','avatar'));


  return redirect("/user/".(string)$id."/edit");

}


// ---------------------------------- Código JuJo xD ----------------------------------

public function storeGame($id)
{

  $game = new Game();

  $game->title = request('title');
  $game->user_id = $id;
  $game->description = request('description');
  $game->miniature = $request->file('miniature')->store('public');
  $game->video = request('video');


}


}
