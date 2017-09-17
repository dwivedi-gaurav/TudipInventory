<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\category;
use App\location;
use App\image;
use App\bill;
use App\vendor;
use App\User;
use Session;


class BillController extends Controller
{
    public function showAddBillForm(){
      $categories=category::all();
      $locations=location::all();
      $vendors=vendor::all();
      $users=user::all();
      $last_bill=bill::latest()->first();
      if(count($last_bill)==0){
        $bill="100";
      }else{
        $bill=$last_bill->bill_number;
      }
      $bill=(int)$bill+1;
      return view('bill.addBill',compact('categories','locations','vendors','users','bill'));
    }

    public function storeBill(Request $request){

    //return $request->file('billImage');
    //  return $request->billImage->extension();
    //  return $request->billImage->store('public');
    //return Storage::putFile('public',$request->file('billImage'));
  //  return $request->billImage->storeAs('public/bills);

  $this->validate($request, [
    'amount' => 'required|min:1',
    'vendor'=> 'required'
  ]);

  if(!$request->hasFile('billImages')){
    return back()->withErrors([
      'message'=>'No image uploaded.'
    ]);
  }

//store bill in bills table.................
$bill=new bill;
$bill->bill_number=$request->bill;
$bill->vendor_id=$request->vendor;
$bill->amount=$request->amount;
$bill->approved_by=$request->approved_by;
$bill->save();


  //slore uploaded bill images in images table...........................

      if($request->hasFile('billImages')){

        foreach ($request->billImages as $billImage) {
          $image=new image;
          $random_string =substr(md5(microtime()),26);
          $imageName= $random_string."_".$billImage->getClientOriginalName();

          $imageSize= $billImage->getClientSize();
          $billImage->storeAs('public/bills',$imageName);
          $image->name=$imageName;
          $image->size=$imageSize;
          $image->bill_id=$bill->id;

          $image->save();
        }

      }
      Session::flash('alert', 'Bill number TudipBill-'.$request->bill.' added seccessfully.');

      return redirect('/showBills');

    }

    public function showBills(){
      //  return Storage::files('public');
      //Storage::makeDirectory('public/bills'); //returns true or false
      //  Storage::deleteDirectory('public/bills');
      // $url=Storage::url('test/me.jpg');
      // return "<img src='".$url."'/>";
      // $url=Storage::url('bills/'.$images[0]->name);
      // return "<img src='".$url."'/>";
      //$images=image::all();
      $categories=category::all();
      $locations=location::all();
      $bills=bill::latest()->get();
      return view('bill.showBill',compact('categories','locations','bills'));
    }

    public function showBillImages($bill_id){
        $categories=category::all();
        $locations=location::all();
        $images=image::where('bill_id',$bill_id)->get();
        $bill=bill::find($bill_id);
        return view('bill.showBillImage',compact('images','categories','locations','bill'));
    }
}
