<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
  public function bill()
  {
      return $this->belongsTo('App\bill');
  }
}
