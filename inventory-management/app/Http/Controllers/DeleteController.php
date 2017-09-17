<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\update;
use Session;
use App\category;
use App\location;

class DeleteController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

  }

    public function deleteLocation(Request $request){
      $loc_id=$request->location;
      $location=location::find($loc_id);
      $unlocated=location::where('location','unlocated')->get();

      item::where('location_id',$loc_id)
          ->update(['location_id' => $unlocated[0]->id]);

      $location->delete();
      Session::flash('alert', $location->location.' location deleted.');
      return redirect('/home');
    }

    public function deleteItem(Request $request){
      $item_id=$request->item;
      $item=item::find($item_id);
      $cat=$item->category->id;
      item::where('id', $item_id)->delete();
      update::where('item_id',$item_id)->delete();
      Session::flash('alert', $item->item.' deleted from '.$item->category->category.'.');
      return redirect('show_items/'.$cat);
    }

    public function deleteCategory(Request $request){
      $cat_id=$request->category;
      $category=category::find($cat_id);
      $uncategorised=category::where('category','uncategorised')->get();

      item::where('category_id',$cat_id)
          ->update(['category_id' => $uncategorised[0]->id]);

      update::where('category_id',$cat_id)
          ->update(['category_id' => $uncategorised[0]->id]);
      $category->delete();
      Session::flash('alert', $category->category.'category deleted.');
      return redirect('/home');
    }
}
