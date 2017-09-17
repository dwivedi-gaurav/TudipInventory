

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
                                  <div class="panel-heading"><h3>Add Vendor</h3></div>
                                  <div class="panel-body">
                                    @include('errors.display')
                                    <form action="/add_vendor" method="post" onsubmit="return validate_addVendor()">
                                      {{csrf_field()}}
                                      <div class="form-group">
                                        <span id="helpBlockname" class="help-block noMargin noPadding message"></span>

                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                      </div>

                                      <div class="form-group" id="email_input">
                                        <span id="helpBlockemail" class="help-block noMargin noPadding message"></span>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">

                                      </div>
                                      <div class="form-group" id="contact_input">
                                        <span id="helpBlockcontact" class="help-block noMargin noPadding message"></span>
                                        <input type="text" class="form-control" id="contact" placeholder="Contact number" name="Contact_number">

                                      </div>
                                      <div class="form-group" id="address_input">
                                        <span id="helpBlockaddress" class="message help-block noMargin noPadding "></span>
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address">

                                      </div>
                                      <div class="form-group" id="city_input">
                                        <span id="helpBlockcity" class="help-block noMargin noPadding message"></span>
                                        <input type="text" class="form-control" id="city" placeholder="City" name="city">

                                      </div>
                                      <div style="text-align:right">

                                        <a class="btn btn-primary btn-sm" href="/vendors" role="button">Cancel</a>

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
