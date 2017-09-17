<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\location;
use App\unit;

class UnitController extends Controller
{
    public function addUnitForm(){
      $categories=category::all();
      $locations=location::all();
      return view('units.addForm',compact('categories','locations'));
    }

    public function addUnit(Request $request){
      $this->validate($request, [
        'unit' => 'required|unique:units|max:190'
      ]);
      $units= new unit;
      $units->unit=$request->unit;
      $units->save();
      return redirect('/showUnits');
    }

    public function showUnits(){
      $categories=category::all();
      $locations=location::all();
      $units=unit::all();
      return view('units.showUnits',compact('categories','locations','units'));
    }
}
