<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
  public function items()
  {
      return $this->hasMany('App\item');
  }
}
