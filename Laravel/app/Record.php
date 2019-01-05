<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    public function game()
 {
     return $this->belongsTo('App\Game');
 }
}
