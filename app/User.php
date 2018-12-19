<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends  Authenticatable
{
  protected $fillable=['name','last_name','description','description','email'
];
  public function game()
  {
      return $this->hasMany('App\Game');
  }
}
