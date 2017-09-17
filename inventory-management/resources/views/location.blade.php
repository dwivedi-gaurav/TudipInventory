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
		    $('#records').DataTable();
        $($('.unsorted')[0]).removeClass('sorting');
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
                              <h2 ><?php echo ucfirst($loc->location)?> Items</h2>
                        </div>

                        @if(!($loc->location=='unlocated'))
                          <div class="col-md-2 col-md-offset-4 col-sm-3 col-xs-5" style=" padding-left:0px; text-align:left" >
                                @include('layouts.deleteLocation')
                          </div>
                        @endif

                  </div>

            </div>
            @if(count($items)==0)
              <h3>Ooops! No  items available in <?php echo ucfirst($loc->location)?>.</h3>
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

                                  <th>Item Name</th>
                                  <th>Quantity at hand</th>
                                  <th>Threshold</th>
                                  <th>Buy/No Buy</th>
                                  <th>Category</th>
                              </tr>
                         </thead>
                         <tbody>

                           @foreach($items as $item)
                             <tr>

                               <td><a href="/records/{{$item->id}}"><?php echo ucfirst($item->item)?></a></td>
                               <td style="text-align:right">{{$item->quantity}}</td>
                               <td style="text-align:right">{{$item->threshold}}</td>
                               <td>
                                 <?php
                                    if($item->quantity < $item->threshold){
                                      echo "Buy";
                                    }else{
                                      echo "No buy";
                                    }
                                 ?>
                               </td>
                               <td><a href="/show_items/{{$item->category->id}}">{{$item->category->category}}</a></td>
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
