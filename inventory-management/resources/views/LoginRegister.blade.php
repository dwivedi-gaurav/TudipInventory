<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>

@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-4 col-md-offset-4 align-center" style="margin-top:2%">
      <img src="images/logomain.png" alt="Tudip Logo">
    </div>
  </div>


  <div class="row" style="margin-top:1%">
    <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4 login-box">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
          <hr>
        </div>
        <div class="col-md-4 col-sm-4 align-center col-xs-4">
          <h3>Log In</h3>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <hr>
        </div>
      </div>

      <div class="row" style="margin-top:10%">
        <span id="helpBlockLogin" class="help-block noMargin noPadding message"></span>
        @include('errors.display')
        @include('errors.flash')
        <form method="post" action="/login" onsubmit="return validate_login()">
          {{csrf_field()}}
          <div class="form-group">
            <input type="email" class="form-control" id="login_email" placeholder="Email" name="login_email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control " id="login_password" placeholder="Password (min. 4 characters)" name="login_password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Log In</button>
        </form>
      </div>
      <div class="row align-center" style="margin-top:5%">
        <a href="/forgot-password">Forgot password?</a>
      </div>
    </div>
    <!-- <div class="col-md-4 col-sm-4 register-box">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
          <hr>
        </div>
        <div class="col-md-4 col-sm-4 align-center col-xs-4">
          <h3>Sign Up</h3>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <hr>
        </div>
      </div>
       ====================REGISTRATION FORM=======================
       <div class="row" style="margin-top:10%">
         @include('errors.display')

        <form method="post" action="/register" onsubmit="return validate_register();">
          {{csrf_field()}}
            <div class="form-group" id="fname_input">
              <input type="text" class="form-control" id="fname" placeholder="First Name" name="First_name">
              <span id="helpBlockfname" class="help-block noMargin noPadding message"></span>
            </div>
            <div class="form-group" id="lname_input">
              <input type="text" class="form-control" id="lname" placeholder="Last Name" name="Last_name">
              <span id="helpBlocklname" class="help-block noMargin noPadding message"></span>
            </div>
            <div class="form-group" id="email_input">
              <input type="email" class="form-control" id="email" placeholder="Email" name="Email">
              <span id="helpBlockemail" class="help-block noMargin noPadding message"></span>
            </div>
            <div class="form-group" id="contact_input">
              <input type="text" class="form-control" id="contact" placeholder="Contact number" name="Contact_number">
              <span id="helpBlockcontact" class="help-block noMargin noPadding message"></span>
            </div>
            <div class="form-group" id="pass_input">
              <input type="password" class="form-control" id="pass" placeholder="Password (min. 4 characters)" name="password">
              <span id="helpBlockpass" class="help-block noMargin noPadding message"></span>
            </div>


            <button type="submit" class="btn btn-primary  btn-block">Sign Up</button>
          </form>

      </div>
     </div>
  </div> -->
  <div class="row align-center col-md-12 col-sm-12 col-xs-12" style="margin-top:4%">
    <p>© Tudip Technologies 2017. All rights reserved.</p>
  </div>
</div>



@endsection

@section('validation_js')

@endsection
