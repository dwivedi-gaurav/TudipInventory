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
                                  <div class="panel-heading"><h3>Add Location</h3></div>
                                  <div class="panel-body">

                                    <form action="/add_location" method="post" onsubmit="return validate_addLocation()">
                                      {{csrf_field()}}
                                      <span id="helpBlockAddLocation" class="help-block noMargin noPadding " style="color:red"></span>
                                      @include('errors.display')

                                      <div class="form-group">
                                        <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location">
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
