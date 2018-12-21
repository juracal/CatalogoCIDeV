<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Game;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;

class GameController extends Controller
{
    //
    public function create ($id)
    {
      $tags=Tag::all();
      $user=User::find($id);
      return view('registerGame',compact('tags','user'));
    }

    public function storeGame ()
    {
      $tags=Tag::all();
      return view('/registerGame',compact('tags'));
    }

    public function projects ($id)
    {
      $user= User::find($id);
      return view('dashboard',compact('user'));
    }



    public function getData(){
      $roles = Game::select(['id','title','description'])->get();
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
