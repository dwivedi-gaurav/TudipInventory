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

  <!-- ================================ -->

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
                                  <div class="panel-heading"><h3>Add Bill</h3></div>
                                  <div class="panel-body">

                                    <form action="/add_bill"  method="post" enctype="multipart/form-data" onsubmit="return validate_addBill()">
                                      {{csrf_field()}}
                                      <span id="helpBlockBillNumber" class="help-block noMargin noPadding " style="color:red"></span>
                                      @include('errors.display')
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="billNumber" id="billNumber" value="TudipBill-{{$bill}}" disabled>
                                      </div>

                                      <div class="form-group">
                                        <span id="helpBlockAmount" class="help-block noMargin noPadding " style="color:red"></span>

                                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Total amount">
                                      </div>

                                      <span id="helpBlockVendors" class="help-block noMargin noPadding " style="color:red"></span>

                                      <div class="form-group">
                                        <?php
                                          $sorted_vendors = array();
                                          foreach($vendors as $vendor) {
                                            $sorted_vendors[$vendor->id]=$vendor->name;
                                          }
                                          asort($sorted_vendors);
                                          ?>


                                          <select class="form-control" name="vendor" id="vendor">
                                            <option value="" selected>Select vendor</option>
                                            @foreach($sorted_vendors as $id => $vendor)
                                              <option value="{{$id}}"><?php echo ucfirst($vendor)?></option>
                                            @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group approvedType">
                                        <label>Approved</label>
                                          <label class="radio-inline">
                                              <input type="radio" name="approved" checked value="yes"> Yes
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="approved" value="no"> No
                                          </label>
                                      </div>

                                      <div class="form-group" id="addBill">
                                        <?php
                                          $sorted_users = array();
                                          foreach($users as $user) {
                                            $sorted_users[ucfirst($user->first_name)." ".ucfirst($user->last_name)]=$user->first_name." ".$user->last_name;
                                          }
                                          asort($sorted_users);
                                          ?>

                                          <span id="helpBlockApprovedBy" class="help-block noMargin noPadding " style="color:red"></span>

                                          <select class="form-control" name="approved_by" id="approved_by">
                                            <option value="" selected>Approved by</option>
                                            @foreach($sorted_users as $id => $user)
                                              <option value="{{$id}}"><?php echo ucfirst($user)?></option>
                                            @endforeach
                                          </select>
                                      </div>

                                      <div class="form-group">
                                        <span id="helpBlockImage" class="help-block noMargin noPadding " style="color:red"></span>

                                        <label for="billImage">Upload bill images</label>
                                        <input type="file" id="billImage" name="billImages[]" multiple>
                                        <p class="help-block">Upload only jpg, jpeg and png image.</p>
                                      </div>

                                      <input type="hidden" name="bill" value="{{$bill}}">
                                      <div style="text-align:right">
                                        <a class="btn btn-primary" href="/home" role="button">Cancel</a>
                                        <button type="submit" class="btn btn-primary" style="margin-left:8px">Add</button>
                                      </div>
                                    </form>
                                  </div>
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

<script type="text/javascript">

</script>

</body>
</html>
