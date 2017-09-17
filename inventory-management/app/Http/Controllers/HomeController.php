<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;
use App\item;
use App\location;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


    public function showCategories(){

      // $item_records=DB::table('items')
      //                   ->join('categories', 'items.category_id', '=', 'categories.id')
      //                   ->select('items.item as item_name', 'items.quantity as quantity_available','categories.category as category_name')
      //                   ->get();
      $item_records=item::all();
      $categories=category::all();
      $locations=location::all();

      return view('home',compact('categories','item_records','locations'));
    }

    public function showItems($id){
      $items=item::where('category_id',$id)->get();
        $categories=category::all();
        $cat=category::find($id);
        $cat_name=$cat->category;
        $locations=location::all();
      return view('items.show',compact('categories','items','id','cat','locations'));
    }
}
