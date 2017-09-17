<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\location;
use App\item;

class LocationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

  }

  public function showItems($loc_id){
      $categories=category::all();
      $locations=location::all();
      $items=item::where('location_id',$loc_id)->get();
      $loc=location::find($loc_id);
      return view('location',compact('categories','locations','items','loc'));
  }

  public function showChangeLocationForm($loc_id,$item_id){
    $categories=category::all();
    $locations=location::all();
    $loc=location::find($loc_id);
    $item=item::find($item_id);
    return view('changeLocation',compact('categories','locations','loc','item'));
  }

  public function changeLocation(Request $request){
      $loc_id=$request->location;
      $item_id=$request->item;
      $item = item::find($item_id);

      $item->location_id = $loc_id;

      $item->save();

      return redirect('/records'.'/'.$item_id);
  }

  public function store(Request $request){
    $this->validate($request, [
      'location' => 'required|unique:locations|max:190'
    ]);
    $loc=new location;
    $loc->location=$request->location;
    $loc->save();
    return redirect('/home');
  }

  public function showForm(){
      $categories=category::all();
      $locations=location::all();
      return view('addLocation',compact('categories','locations'));
  }
}
