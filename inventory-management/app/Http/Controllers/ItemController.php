<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\category;
use App\update;
use App\location;
use App\bill;
use Session;
use App\unit;

class ItemController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }

  //=================================

  public function store(Request $request,$cat_id){
    $this->validate($request, [
      'item' => 'required|unique:items|max:190',
      'location' => 'required',
      'threshold' => 'required|min:0',
      'unit' => 'required'
    ]);
    $item=new item;
    $item->item=$request->item;
    $item->quantity=0;
    $item->category_id=$cat_id;
    $item->location_id=$request->location;
    $item->threshold=$request->threshold;
    $item->unit_id=$request->unit;
    $item->save();
    return redirect('/show_items'.'/'.$cat_id);
  }

  public function showForm($cat_id){
      $categories=category::all();
      $locations=location::all();
      $cat=category::find($cat_id);
      $units=unit::all();
      return view('addItem',compact('categories','locations','cat','units'));
  }

  //================

  // public function add(Request $request){
  //   $this->validate($request, [
  //     'item' => 'required|unique:items|max:190'
  //   ]);
  //   $item=new item;
  //   $item->item=$request->item;
  //   $item->quantity=0;
  //   $item->category_id=$request->category;
  //   $item->save();
  //   return redirect()->back();
  // }
  public function updateItems(Request $request){
    $this->validate($request, [
      'update_type' => 'required',
      'quantity' => 'required|min:1|max:10000',
      'description' => 'required'
    ]);
    $update_type=$request->update_type;
    if($update_type=="purchased" && $request->billNo!=""){
      $billExists=bill::where('bill_number',$request->billNo)->get();
      if(count($billExists)==0){
        return redirect()->back()->withErrors([
          'message'=>"Sorry, Bill number ".$request->billNo." does not exist."
        ]);
      }
    }
    if($request->date==""){
      $date=date('Y-m-d H:i:s');
    }else{
      $date=$request->date;
    }

    $quantity=$request->quantity;
    $item_id=$request->item_id;
    $item=item::find($item_id);
    if($update_type=='purchased'){
      $item->quantity=$item->quantity + $quantity;
      Session::flash('alert', $quantity.' units of '.$item->item.' purchased.');
    }else if($update_type=='used'){
      if($item->quantity < $quantity){
        return redirect()->back()->withErrors([
          'message'=>'Sorry, only '.$item->quantity.' unit of '.$item->item.' available.'
        ]);
      }
      $item->quantity=$item->quantity - $quantity;
      Session::flash('alert', $quantity.' units of '.$item->item.' used.');
    }
    $item->save();
    $update_type=$request->update_type;
    $quantity=$request->quantity;
    $item_id=$request->item_id;

    $updates=new update;
    if($update_type=="purchased"){
      $updates->bill_number=$request->billNo;
      $updates->unit_price=$request->unitPrice;
    }
    $updates->user_id=auth()->id();
    $updates->category_id=$request->category_id;
    $updates->item_id=$item_id;
    $updates->quantity=$quantity;
    $updates->update_type=$update_type;
    $updates->description=$request->description;
    $updates->added_on=$date;
    $updates->save();
    return redirect("/show_items"."/".$request->category_id);
  }

  public function showUpdateForm($category,$item){
    $item=item::find($item);
    $category=category::find($category);
    $categories=category::all();
    $locations=location::all();
    return view('items.update',compact('item','category','categories','locations'));
  }
}
