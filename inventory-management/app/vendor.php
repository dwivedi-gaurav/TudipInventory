<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
  public function bills()
  {
      return $this->hasMany('App\bill');
  }
}
