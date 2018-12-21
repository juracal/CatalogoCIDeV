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
use Illuminate\Support\Facades\Redirect;
use Session;


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

  $role= $user->role_id;
  if($user->role_id == 1){
  $role = Role::where('name', request('rls'))->first()->id;
}


  $user->update($request->only('name','last_name','description','email','avatar',$role));
  return Redirect::to(Session::get('backUrl'));
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







// ---------------------------------- Código JuJo xD ----------------------------------


public function storeGame(Request $request, $id)
{
  $tags = request('tags');


  $user = User::find($id);
  $game = new Game();

  $game->title = request('title');
  $game->user_id = $id;
  $game->description = request('description');
  //$game->miniature = $request->file('miniature')->store('public');
  $game->video = request('video');
  $game->hidden= 'True';
  $game->save();
  $id_new=$game->id;

  foreach ($tags as $tag) {
    $tag_id = Tag::where('name', $tag)->first()->id;
    $game->tag()->attach($tag_id);
  }


  $imag_obj= new Image();

  if($request->hasFile('ss1'))
  {
    $imag_obj->url=$request-> file('ss1')->store('public');
  }
  $imag_obj->game_id=$id_new;
  $imag_obj->save();

  $imag_obj2= new Image();
  if($request->hasFile('ss2'))
  {
    $imag_obj2->url=$request-> file('ss2')->store('public');
  }
  $imag_obj2->game_id=$id_new;
  $imag_obj2->save();

  $imag_obj3= new Image();
  if($request->hasFile('ss3'))
  {
    $imag_obj3->url=$request-> file('ss3')->store('public');
  }
  $imag_obj3->game_id=$id_new;
  $imag_obj3->save();


  $archive_obj= new Archive();

  if($request->hasFile('fw'))
  {
    $archive_obj->url=$request-> file('fw')->store('public');
  }
  $archive_obj->game_id=$id_new;
  $archive_obj->operative_system='Windows';
  $archive_obj->save();




  $archive_obj2= new Archive();
  if($request->hasFile('fl'))
  {
    $archive_obj2->url=$request-> file('fl')->store('public');
  }
  $archive_obj2->game_id=$id_new;
  $archive_obj2->operative_system='Linux';
  $archive_obj2->save();




  $archive_obj3= new Archive();
  if($request->hasFile('fm'))
  {
    $archive_obj3->url=$request-> file('fm')->store('public');
  }

  $archive_obj3->game_id=$id_new;
  $archive_obj3->operative_system='Mac';
  $archive_obj3->save();






  return view('/dashboard',compact('user'));
}


}
