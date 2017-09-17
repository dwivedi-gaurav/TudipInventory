<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  public function items()
  {
      return $this->hasMany('App\item');
  }
}
