<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Game;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    //
    public function create ($id)
    {
      if(Auth::user()){
      $tags=Tag::all();
      $user=User::find($id);
      return view('registerGame',compact('tags','user'));
    }
    else{
      return redirect('/login');
    }
    }

    public function editGame(Request $request, $user_id, $game_id ){

      $game = Game::find($game_id);
      $user = User::find($user_id);

      //$tags =

      $game->update($request->only('title','user_id','description','video','hidden'));




      return view('editGame', compact('user', 'game'));
    }

    public function storeGame(Request $request, $id)
    {
      $tags = request('tags');


      $user = User::find($id);
      $game = new Game();

      $game->title = request('title');
      $game->user_id = $id;
      $game->description = request('description');
      $game->video = request('video');
      $game->hidden= 'False';
      $game->save();
      $id_new=$game->id;

      foreach ($tags as $tag) {
        $tag_id = Tag::where('name', $tag)->first()->id;
        $game->tag()->attach($tag_id);
      }

      //$game->miniature = $request->file('miniature')->store('public');

      $imag_obj= new Image();

      $imag_obj->url=$request-> file('ss1')->store('public');
      $imag_obj->game_id=$id_new;
      $imag_obj->save();

      $imag_obj2= new Image();
      $imag_obj2->url=$request-> file('ss2')->store('public');
      $imag_obj2->game_id=$id_new;
      $imag_obj2->save();

      $imag_obj3= new Image();
      $imag_obj3->url=$request-> file('ss3')->store('public');
      $imag_obj3->game_id=$id_new;
      $imag_obj3->save();


      $archive_obj= new Archive();

      $archive_obj->url=$request-> file('fw')->store('public');
      $archive_obj->game_id=$id_new;
      $archive_obj->operative_system='Windows';
      $archive_obj->save();

      $archive_obj2= new Archive();
      $archive_obj2->url=$request-> file('fl')->store('public');
      $archive_obj2->game_id=$id_new;
      $archive_obj2->operative_system='Linux';
      $archive_obj2->save();

      $archive_obj3= new Archive();
      $archive_obj3->url=$request-> file('fm')->store('public');
      $archive_obj3->game_id=$id_new;
      $archive_obj3->operative_system='Mac';
      $archive_obj3->save();






      return view('/dashboard',compact('user'));
    }

    public function projects ($id)
    {
      Session::flash('backUrl', Request::fullUrl());
      $user= User::find($id);
      return view('dashboard',compact('user'));
    }



    public function getData($id){

      $user=User::find($id);
      if($user->role_id == 2){
      $roles = Game::select(['id','title','description'])->where('hidden','True')->where('user_id',$id)->get();
      }
      else
      {
        $roles = Game::select(['id','title','description'])->get();
      }
      return Datatables::of($roles)
      -> addColumn('action', function () {
                 return '
                 <a class="fa fa-eye btn btn-info" id="btn-table">Ver</a>
                 <a class="fa fa-edit btn btn-warning" id="btn-table">Editar</a>
                 <a class="fa fa-trash btn btn-danger" id="btn-table" >Eliminar</a>';})

      ->make(true);

    }

    public function getProyectos($id)
    {
      $tags=Tag::all();
      $user=User::find($id);
      return view('registerGame',compact('tags','user'));
    }

}
