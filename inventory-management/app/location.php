<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
  public function items()
  {
      return $this->hasMany('App\item');
  }
}
