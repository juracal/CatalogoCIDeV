<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function game()
 {
     return $this->belongsToMany('App\Game');
 }
}
