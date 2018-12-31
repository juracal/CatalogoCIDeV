<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Game;
use App\User;
use App\Role;
use App\Image;
use App\Archive;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
/*
Función para cargar la vista de crear un juego
*/
    public function create ($id)
    {
      if(Auth::user()){
      $tags=Tag::all();
      $user=User::find($id);
      return view('registerGame',compact('user','tags'));
    }
    else{
      return redirect('/login');
    }
    }

/*
Función para editar guardar los cambios de un juego en la BD
*/

    public function editGame(Request $request, $user_id, $game_id ){

      $this-> rules($request);


      $game = Game::find($game_id);
      $user = User::find($user_id);
      $tags = request('tags');

      $game->title = request('title');
      $game->description = request('description');
      $game->video = request('video');

      if($request->hasFile('miniature'))
      {
        $game->miniature = $request->file('miniature')->store('public');
      }

      $game->save();

      $game->tags()->detach();
      foreach ($tags as $tag)
      {
        $tag_id = Tag::where('name', $tag)->first()->id;
        $game->tags()->attach($tag_id);
      }

      $this->saveImages($request, $game_id);
      $this->saveArchives($request,$game_id);

      return redirect("/user/".(string)$user_id."/proyectos");
    }


/*
Función para cargar la vista de editar un juego
*/
    public function getInfo($user_id, $game_id){
      $game = Game::find($game_id);
      $user = User::find($user_id);
      $tags = Tag::all();
      if (!$game) return abort(404);

      return view('/editGame',compact('user','game', 'tags'));

    }

/*
Función para guardar los juegos en la BD
*/

    public function storeGame(Request $request, $id)
    {
      $this->rules($request);

      $tags = request('tags');
      $user = User::find($id);
      $game = new Game();

      $game->title = request('title');
      $game->user_id = $id;
      $game->description = request('description');
      $game->video = request('video');
      $game->status= 'Visible';

      if($request->hasFile('miniature')){
          $game->miniature = $request->file('miniature')->store('public');
      }

      $game->save();
      $id_new=$game->id;

      foreach ($tags as $tag) {
        $tag_id = Tag::where('name', $tag)->first()->id;
        $game->tags()->attach($tag_id);
      }

      $this->saveImages($request,$id_new);
      $this->saveArchives($request,$id_new);

      return view('/dashboard',compact('user'));
    }

/*
Función para cargar la vista "dashboard"
*/
    public function projects ($id)
    {
      $user= User::find($id);
      return view('dashboard',compact('user'));
    }



    public function getGamesView($id){
      $game = Game::find($id);
      $images = Image::where('game_id', $game->id)->get();


      return view('game', compact('game', 'images'));
    }

/*
Función para obtener los juegos de un usuario
*/

    public function getData($id){

      $user=User::find($id);
      if($user->role_id == 2){
      $roles = Game::select(['id','title','description','status'])->where('status','Visible')->where('user_id',$id)->get();
      }
      else
      {
        $roles = Game::select(['id','title','description','status'])->get();
      }
      return Datatables::of($roles)
      -> addColumn('action', function () {
                 return ;})

      ->make(true);
    }


/*
Función que retorna la vista para registrar un juego
*/
    public function getProyectos($id)
    {
      $tags=Tag::all();
      $user=User::find($id);
      return view('registerGame',compact('tags','user'));
    }


/*
Función para la eliminación de los juegos
*/

    public function deleteGame($user,$id){

      $game = Game::find($id);
      if(  $game->status == 'Visible')
        $game->status = 'No Visible';
      else{
        $game->status = 'Visible';
      }
      $game->save();
      return redirect("/user/".(string)$user."/proyectos");
    }


/*
Función para guardar las imágenes en la base de datos
*/

    public function saveImages(Request $request,$id_new){

      $imag_obj = new Image();

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


    }

/*
Función para guardar los archivos en la base de datos
*/

    public function saveArchives(Request $request,$id_new){

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

    }

/*
Función para validar los campos del formulario.
*/
    public function rules(Request $request){
      $rules = [
         'ss1'=>'mimes:jpeg,jpg,png',
         'ss2'=>'mimes:jpeg,jpg,png',
         'ss3'=>'mimes:jpeg,jpg,png'
     ];

     $customMessages = [
         'mimes' => 'El screenshot :attribute debe ser una imagen [jpeg,jpg,png]'
     ];

     $this->validate($request, $rules, $customMessages);
    }


}
