<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\category;
use App\location;
use App\update;
use Session;

class TrashController extends Controller
{
    public function showTrash(){
      $categories=category::all();
      $locations=location::all();
      $deletedItems=item::onlyTrashed()->get();
      return view('trash.showTrash',compact('categories','locations','deletedItems'));
    }

    public function restore($item_id){
     $item=item::onlyTrashed()->where('id',$item_id);
      $updates=update::withTrashed()
                      ->where('item_id',$item_id)
                      ->restore();
     $item->restore();
      $item=item::find($item_id);
      Session::flash('alert', 'Successfully restored '.$item->item.' in '.$item->category->category.' category.');
      return redirect('/show_items'.'/'.$item->category->id);
    }
}
