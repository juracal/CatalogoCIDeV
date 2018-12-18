<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class GameController extends Controller
{
    //
    public function create ()
    {
      $tags=Tag::all();
      return view('registerGame',compact('tags'));
    }

    public function storeGame ()
    {
      $tags=Tag::all();
      return view('registerGame',compact('tags'));
    }
}
