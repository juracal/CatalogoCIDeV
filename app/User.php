<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  use HasApiTokens, Notifiable;


  protected $fillable=[
    'name','last_name','description','email','role','hidden'
  ];


  protected $hidden = [
    'password', 'remember_token',
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
