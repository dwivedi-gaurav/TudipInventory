<!-- =================================================== -->

<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/mystyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/myJS.js"></script>

</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    @include('layouts.nav')

    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="container-fluid " ><!--Content-->
            <div class="row" style="padding-bottom:10px; margin-bottom:3%">
                  <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3 " style="padding-left:0px">
                              <h2 ></h2>
                              <div class="panel panel-default">
                                  <div class="panel-heading"><h3>Add Item</h3></div>
                                  <div class="panel-body">

                                    <form action="/add_item" method="post" onsubmit="return validate_addItem()">
                                      {{csrf_field()}}
                                      <span id="helpBlockAddItem" class="help-block noMargin noPadding " style="color:red"></span>
                                      @include('errors.display')

                                      <div class="form-group">
                                        <input type="text" class="form-control" name="item" id="item" placeholder="Enter item">
                                      </div>

                                      <div style="text-align:right">

                                        <a class="btn btn-primary btn-sm" href="/home" role="button">Cancel</a>

                                        <button type="submit" class="btn btn-primary btn-sm" style="margin-left:8px">Add</button>

                                      </div>
                                      </form>
                                  </div>
                              </div>
                        </div>

                  </div>
            </div>

            <div style="overflow-x:auto;">
              <div class="row">
                  <div class="col-md-12">

                 </div>
              </div>
            </div>



      </div><!--End Content-->

</div>

</body>
</html>


<!-- ================================================ -->
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

  </div>

  <div class="row align-center" style="margin-top:4%">
    <p>© Tudip Technologies 2017. All rights reserved.</p>
  </div>

</div>
@endsection

@section('validation_js')
  <script type="text/javascript">


    function validate_login(){
      var email=document.getElementById('login_email').value;
      var password=document.getElementById('login_password').value;
      if(email=="" || password==""){
        document.getElementById('helpBlockLogin').innerHTML="Both email and password are required.";
        return false;
      }else{
        document.getElementById('helpBlockLogin').innerHTML="";
        return true;
      }

    }
  </script>
@endsection
=======================table area=========================================================


<!-- <div class="container-fluid " >
  <div class="row" style="padding-bottom:10px">
  <div class="col-md-12">
    <div class="col-md-8">
     <h2 >Category Name</h2>
   </div>
    <div class="col-md-4 " style="padding-top:20px" >



    <a href=""> <button type="button" class="btn btn-primary col-md-4 " >Add Item</button></a>
    </div>
      </div>
  </div>
  <div style="overflow-x:auto;">
  <table class="table table-hover ">
    <thead>
      <tr>
        <th>Sr.No.</th>
        <th>Item Name</th>
        <th>Quantity Available</th>
        <th>Purchase/Used</th>


      </tr>
    </thead>
    <tbody>
      <tr>
        <td>01</td>
     <td>  <a href=""> ***</a></td>
        <td>00</td>
        <td>
            <a href ""><button type="button" class="btn btn-primary"> Purchased/Used</button></a>
        </td>
      </tr>
      <tr>
        <td>02</td>
   <td>  <a href=""> ***</a></td>
           <td>00</td>
        <td>
          <a href ""><button type="button" class="btn btn-primary"> Purchased/Used</button></a>
        </td>
      </tr>
      <tr>
        <td>03</td>
         <td>  <a href=""> ***</a></td>
        <td>00</td>
        <td>
        <a href "">  <button type="button" class="btn btn-primary"> Purchased/Used</button></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</div> -->
<!-- </div>/#wrapper -->


<!--========================================register JS===============================  -->

// function validate_register(){
//   var fname=document.getElementById('fname').value;
//   var lname=document.getElementById('lname').value;
//   var email=document.getElementById('email').value;
//   var password=document.getElementById('pass').value;
//   var contact=document.getElementById('contact').value;
//
//   var submitOk=1;
//   if(fname==""){
//     document.getElementById('helpBlockfname').innerHTML="Your first name is required.";
//     submitOk=0;
//   }else{
//     document.getElementById('helpBlockfname').innerHTML="";
//   }
//   if(password==""){
//     document.getElementById('helpBlockpass').innerHTML="Password is required.";
//     submitOk=0;
//   }else{
//     if(password.length<4){
//       document.getElementById('helpBlockpass').innerHTML="Your password length must be greater than 4 characters.";
//       submitOk=0;
//     }else{
//       document.getElementById('helpBlockpass').innerHTML="";
//     }
//   }
//   if(lname==""){
//     document.getElementById('helpBlocklname').innerHTML="Your last name is required.";
//     submitOk=0;
//   }else{
//     document.getElementById('helpBlocklname').innerHTML="";
//   }
//   if(email==""){
//     document.getElementById('helpBlockemail').innerHTML="Your email is required.";
//     submitOk=0;
//   }else{
//     document.getElementById('helpBlockemail').innerHTML="";
//   }
//   if(contact==""){
//     document.getElementById('helpBlockcontact').innerHTML="Your contact number is required.";
//     submitOk=0;
//   }else{
//     if(isNaN(contact)){
//       document.getElementById('helpBlockcontact').innerHTML="Your contact number should contain only digits.";
//       submitOk=0;
//     }else if(contact.length != 10){
//       document.getElementById('helpBlockcontact').innerHTML="Your contact number must be of 10 digits.";
//       submitOk=0;
//     }else{
//       document.getElementById('helpBlockcontact').innerHTML="";
//     }
//   }
//
//   if(submitOk==0){
//     return false;
//   }else{
//     return true;
//   }
// }
<!-- =====================Sidebar Nav===================================== -->


<div class="collapse navbar-collapse navbar-default navbar-ex1-collapse  overflow-y: scroll;" >
    <ul class="nav navbar-nav side-nav navbar-default  overflow-y: scroll;"  style="border-right:1px solid lightgrey;overflow-y: scroll;">
      <a href="/home">  <li><h3 style="margin-left:13px">Categories</h3></li></a>
        @foreach($categories as $category)
        <li >
          <a href="/show_items/{{$category->id}}" ><?php echo ucfirst($category->category)?></a>
        </li>
        @endforeach

    </ul>

</div>
