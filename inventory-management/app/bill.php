<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
  public function images()
  {
      return $this->hasMany('App\image');
  }

  public function vendor()
  {
      return $this->belongsTo('App\vendor');
  }
}
