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
      $user= User::find($id);
      $tags=Tag::all();
      return view('/registerGame',compact('user'));
    }

    public function storeGame ()
    {
      $tags=Tag::all();
      return view('/registerGame',compact('tags'));
    }
}
