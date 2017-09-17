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

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="/js/myJS.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

  <script type="text/javascript">

		$(document).ready(function() {
		    $('#records').DataTable({
          "lengthMenu": [[-1,10, 25, 50,100], ["All",10, 25, 50,100]],
        dom: 'Blfrtip',
         buttons: [
             'print'
         ]

    } );
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
                              <h2 ><?php echo ucfirst($cat->category)?> Items</h2>
                        </div>

                        <div class="col-md-2 col-md-offset-2 col-sm-3 col-xs-5 " style="padding-top:20px; padding-left:0px; text-align:left" >
                          <a class="btn btn-primary btn-sm" href="/add_item/{{$cat->id}}" role="button">Add <?php echo ucfirst($cat->category)?> item</a>
                        </div>

                        @if(!($cat->category=='uncategorised'))
                          <div class="col-md-2 col-sm-3 col-xs-5" style=" padding-left:0px; text-align:left" >
                                @include('layouts.deleteCategory')
                          </div>
                        @endif

                  </div>

            </div>
            @if(count($items)==0)
              <h3>Ooops! No <?php echo ucfirst($cat->category)?> items available.</h3>
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
                                  <th>Storage</th>
                                  <th class="unsorted">Update Item</th>
                              </tr>
                         </thead>
                         <tbody>

                           @foreach($items as $item)
                             <tr>

                               <td><a href="/records/{{$item->id}}"><?php echo ucfirst($item->item)?></a></td>
                               <td style="text-align:right">
                                 {{$item->quantity}}
                                 <?php
                                 if(count($item->unit)!=0){
                                   echo '('.ucfirst($item->unit->unit).')';
                                 }
                                 ?>
                               </td>
                               <td style="text-align:right">{{$item->threshold}}</td>
                               <td>
                                 <?php
                                    if($item->quantity <= $item->threshold){
                                      echo "Buy";
                                    }else{
                                      echo "No";
                                    }
                                 ?>
                               </td>
                               <td><?php echo ucfirst($item->location->location)?></td>
                               <td><a href="/update/{{$id}}/{{$item->id}}" class="btn btn-primary btn-sm" role="button">Purchased/Used</a></td>

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
