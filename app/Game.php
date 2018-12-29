<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Game extends Model
{

  protected $fillable=['title','user_id','description','video','hidden'];


  public function images()
  {
    return $this->hasMany('App\Image');
  }

  public function archive()
  {
    return $this->hasMany('App\Archive');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag')->withPivot('tag_id');
  }

  public function comment()
  {
    return $this->hasMany('App\Comment');
  }

  public function record()
  {
    return $this->hasMany('App\Record');
  }

}
