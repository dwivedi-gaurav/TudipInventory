<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\item;
use App\location;

class CategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

  }

  public function showChangeCategoryForm($cat_id,$item_id){
    $categories=category::all();
    $locations=location::all();
    $cat=category::find($cat_id);
    $item=item::find($item_id);
    return view('changeCategory',compact('categories','locations','cat','item'));
  }

  public function changeCategory(Request $request){
      $cat_id=$request->category;
      $item_id=$request->item;
      $item = item::find($item_id);

      $item->category_id = $cat_id;

      $item->save();

      return redirect('/records'.'/'.$item_id);
  }

  public function store(Request $request){
    $this->validate($request, [
      'category' => 'required|unique:categories|max:190'
    ]);
    $cat=new category;
    $cat->category=$request->category;
    $cat->save();
    return redirect('/home');
  }

  public function showForm(){
      $categories=category::all();
      $locations=location::all();
      return view('addCategory',compact('categories','locations'));
  }

}
