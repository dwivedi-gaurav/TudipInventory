<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\recover;
use Mail;
use App\mail\PasswordRecovery;
use Session;

class ForgotPasswordController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest');
  }

    public function forgotPassword(){
      return view('auth.forgotPassword');
    }

    public function sendMail(Request $request){
      $user=user::whereEmail($request->recovery)->first();
      if(count($user)==0){
        return redirect()->back()->withErrors([
          'message'=>'Email not registered.'
        ]);
      }
      $recover= new recover;
      $target=md5(microtime());
      $recover->email=$request->recovery;
      $recover->token=$target;
      $recover->save();
      Mail::send(new PasswordRecovery($user,$target));
      Session::flash('alert', 'Recovery Email sent!');
      return redirect('/forgot-password');
    }

    public function resetPassword(Request $request){
      $email=$request->email;
      $token=$request->token;
      $change=recover::where('email',$email)->where([
                                                      ['email', '=', $email],
                                                      ['token', '=', $token],
                                                  ])->get();
      if(count($change)==0){

        Session::flash('alert', 'Invalid access!');
        return redirect('/forgot-password');
      }
      return view('auth.resetPassword');
    }

    public function changePassword(Request $request){
      $this->validate($request, [
        'password' => 'required|min:4|confirmed',
        'password_confirmation'=>'required'
      ]);
      $email=$request->email;
      $pass=bcrypt($request->password);
      $user=new user;
      user::where('email',$email)
          ->update(['password' => $pass]);

      Session::flash('alert', 'Password successfully changed!');
      return redirect('/');
    }
}
