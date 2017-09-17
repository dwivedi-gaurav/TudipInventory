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
        <form method="post" action="/forgot-password" onsubmit="return validate_login()">
          {{csrf_field()}}
          <div class="form-group">
            <input type="email" class="form-control" id="recovery" placeholder="Email" name="recovery">
          </div>

          <button type="submit" class="btn btn-primary btn-block">Recover</button>
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
      var email=document.getElementById('recovery').value;
      if(email==""){
        document.getElementById('helpBlockLogin').innerHTML="Email is required.";
        return false;
      }else{
        document.getElementById('helpBlockLogin').innerHTML="";
        return true;
      }

    }
  </script>
@endsection
