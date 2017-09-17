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

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">


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
            <div class="row" style="padding-bottom:10px; margin-bottom:2%">
                  <div class="col-md-12" style="padding-left:4%">
                        <div class="col-md-4" style="padding-left:0px">
                              <div class="row">
                                <h2 >TudipBill-{{$bill->bill_number}}</h2>
                              </div>

                              <div class="row">
                                  <h4>Vendor: {{$bill->vendor->name}}</h4>
                              </div>

                              <div class="row">
                                  <h4>Total amount: {{$bill->amount}}</h4>
                              </div>
                              <div class="row">
                                  <h4>Approved By:
                                    <?php
                                      if($bill->approved_by==""){
                                        echo "Not approved";
                                      }else{
                                        echo ucfirst($bill->approved_by);
                                      }
                                    ?>
                                  </h4>
                              </div>
                        </div>


                        <div class="col-md-4 col-md-offset-2">
                          @foreach($images as $image)
                          <div class="row" style="margin-bottom:8px">
                            <img src="/storage/bills/{{$image->name}}" alt="TudipBill-{{$bill->bill_number}}" class="img-responsive">
                          </div>
                          @endforeach
                        </div>

                  </div>

            </div>
            @if(count($images)==0)
              <h3>Ooops! No bill image available.</h3>
              <div class="row" style="margin-top:5%">
                <div class="col-md-4">
                  @include('errors.flash')
                </div>
              </div>
              <?php exit()?>
            @endif




      </div><!--End Content-->

</div>

</body>
</html>
