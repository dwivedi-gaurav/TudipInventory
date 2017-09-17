<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\update;
use App\category;
use App\item;
use App\location;

class RecordController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

  }

    public function showRecords($item_id){
      $categories=category::all();
      $updates=update::where('item_id',$item_id)->orderBy('added_on', 'desc')->get();
      $item=item::find($item_id);
      $locations=location::all();
      return view('update_records',compact('updates','categories','item','locations'));
    }
}
