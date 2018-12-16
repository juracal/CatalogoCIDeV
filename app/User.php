<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable=['name','last_name','description','description','email'
];
  public function game()
  {
      return $this->hasMany('App\Game');
  }
}
