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
  <script type="text/javascript">
		$(document).ready(function() {
		    $('#records').DataTable({
          "order": [[ 0, "desc" ]]
        });
		});
	</script>

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
                  <div class="col-md-12">
                        <div class="col-md-6" style="padding-left:0px">
                              <h2 >Bill record</h2>
                        </div>

                        <div class="col-md-2 col-md-offset-4 col-sm-3 col-xs-5 " style="padding-top:20px; padding-left:0px; text-align:left" >
                          <a class="btn btn-primary btn-sm" href="/add_bill" role="button">Add Bill</a>
                        </div>

                  </div>

            </div>
            @if(count($bills)==0)
              <h3>Ooops! No bill available.</h3>
              <div class="row" style="margin-top:5%">
                <div class="col-md-4">
                  @include('errors.flash')
                </div>
              </div>
              <?php exit()?>
            @endif

            <div style="overflow-x:auto;">

              <div class="row">
                  <div class="col-md-12">

                      <table class="table table-hover table-bordered " id="records">
                          <thead>
                              <tr>

                                  <th>Bill number</th>
                                  <th>Vendor</th>
                                  <th>Total amount</th>
                                  <th>Approved by</th>
                                  <th></th>
                              </tr>
                         </thead>
                         <tbody>

                              @foreach($bills as $bill)
                              <tr>
                                <td>TudipBill-{{$bill->bill_number}}</td>
                                <td><?php echo ucfirst($bill->vendor->name)?></td>
                                <td style="text-align:right">{{$bill->amount}}</td>
                                <td>
                                  <?php
                                    if($bill->approved_by==""){
                                      echo "Not approved";
                                    }else{
                                      echo ucfirst($bill->approved_by);
                                    }
                                  ?>
                              </td>
                                <td><a class="btn btn-primary btn-sm" href="/showBillImages/{{$bill->id}}" role="button">View </a></td>
                              </tr>
                              @endforeach

                         </tbody>
                      </table>
                 </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                @include('errors.flash')
              </div>
            </div>

      </div><!--End Content-->

</div>

</body>
</html>
