<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\location;
use App\vendor;

class VendorController extends Controller
{
    public function showVendors(){
      $categories=category::all();
      $locations=location::all();
      $vendors=vendor::all();
      return view('vendors.show_vendors',compact('categories','locations','vendors'));
    }

    public function showAddVendorForm(){
      $categories=category::all();
      $locations=location::all();
      return view('vendors.add_vendor',compact('categories','locations'));
    }

    public function addVendor(Request $request){
      $this->validate($request, [
        'name' => 'required|unique:vendors|max:190',
        'email' => 'email',
        'Contact_number' => 'required|max:10',
        'address' => 'required',
        'city' => 'required'
      ]);

      $vendor=new vendor;
      $vendor->name=$request->name;
      $vendor->email=$request->email;
      $vendor->contact_number=$request->Contact_number;
      $vendor->address=$request->address;
      $vendor->city=$request->city;
      $vendor->save();
      return redirect('/vendors');
    }
}
