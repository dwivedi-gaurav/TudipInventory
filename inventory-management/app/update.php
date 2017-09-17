<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class update extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at','added_on'];
  //  protected $dates = ['added_on'];

    public function user(){
       return $this->belongsTo('App\user');
    }
    public function item(){
       return $this->belongsTo('App\item');
    }
    public function category(){
       return $this->belongsTo('App\category');
    }
}
