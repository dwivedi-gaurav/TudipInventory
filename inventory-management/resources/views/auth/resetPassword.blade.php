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

        <div class="col-md-12 col-sm-12 align-center col-xs-12">
          <h3>Reset Password</h3>
        </div>

      </div>

      <div class="row" style="margin-top:10%">
        <span id="helpBlockLogin" class="help-block noMargin noPadding message"></span>
        @include('errors.display')
        @include('errors.flash')
        <form method="post" action="/recover" onsubmit="return validate_login()">
          {{csrf_field()}}
          <div class="form-group">
            <input type="password" class="form-control" id="pass" placeholder="New password (min. 4 characters)" name="password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="cnf_pass" placeholder="Confirm password" name="password_confirmation">
          </div>
          <input type="hidden" name="email" value="{{$_GET['email']}}">
          <button type="submit" class="btn btn-primary btn-block">Change Password</button>
        </form>
      </div>

    </div>

  </div>

  <div class="row align-center" style="margin-top:4%">
    <p>© Tudip Technologies 2017. All rights reserved.</p>
  </div>

</div>
@endsection

@section('validation_js')
  <script type="text/javascript">


    function validate_login(){
      var pass=document.getElementById('pass').value;
      var cnf_pass=document.getElementById('cnf_pass').value;

      if(pass=="" || cnf_pass==""){
        document.getElementById('helpBlockLogin').innerHTML="Both fields are required.";
        return false;
      }else if(pass != cnf_pass){
        document.getElementById('helpBlockLogin').innerHTML="Password and confirm password not matched.";
        return false;
      }else{
        if(pass.length<4){
          document.getElementById('helpBlockpass').innerHTML="Your password length must be greater than 4 characters.";
          return false;
        }else{
          document.getElementById('helpBlockpass').innerHTML="";
          return true;
        }
      }

    }
  </script>
@endsection
