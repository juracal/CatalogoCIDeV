<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $fillable=['name','last_name','description','description','email','role','hidden'
];

  public function game()
  {
      return $this->hasMany('App\Game');
  }

  public function role()
  {
      return $this->hasMany('App\Role');
  }
}
