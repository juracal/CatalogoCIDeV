<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\User;

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
}
