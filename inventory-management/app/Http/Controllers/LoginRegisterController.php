<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class LoginRegisterController extends Controller{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function create(){
      return view('LoginRegister');
    }



    public function login(Request $request){
      $email=$request->login_email;
      $pass=$request->login_password;
      
      if(!auth()->attempt(['email' => $email, 'password' => $pass])){
        return back()->withErrors([
          'message'=>'Please check your credentials and try again.'
        ]);
      }
      return redirect()->home();
    }

    public function logout(){
      auth()->logout();
      return redirect('/');
    }
}
