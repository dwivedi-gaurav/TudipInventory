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
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

  <script src="/js/myJS.js"></script>



  <script type="text/javascript">
		$(document).ready(function() {
		    $('#records').DataTable( {
          "lengthMenu": [[-1,10, 25, 50,100], ["All",10, 25, 50,100]],
          dom: 'Blfrtip',
          buttons: [
             'print'
           ]
         } );
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
  <br>
    <div class="container-fluid " ><!--Content-->

      <div class="row">
        <div class="col-md-12">
          <h3 style="margin-top:0px; margin-bottom:30px">Inventory Snapshot</h3>
        </div>
      </div>

             <div style="overflow-x:auto;">
              <div class="row">
                  <div class="col-md-12">
                      <table class="table table-hover table-bordered" id="records">
                          <thead>
                              <tr>
                                  <th>Item Name</th>
                                  <th>Category</th>
                                  <th>Quantity at hand</th>
                                  <th>Threshold</th>
                                  <th>Buy/No Buy</th>
                                  <th>Storage</th>
                              </tr>
                         </thead>
                         <tbody>

                             @foreach($item_records as $record)
                               <tr>
                                 <td><a href="/records/{{$record->id}}"><?php echo ucfirst($record->item);?></a></td>
                                 <td><a href="/show_items/{{$record->category->id}}"><?php echo ucfirst($record->category->category);?></a></td>
                                 <td style="text-align:right">
                                   <?php
                                      echo ucfirst($record->quantity);
                                      if(count($record->unit)!=0){
                                        echo '('.ucfirst($record->unit->unit).')';
                                      }
                                   ?>
                                 </td>
                                 <td style="text-align:right">{{$record->threshold}}</td>
                                 <td>
                                   <?php
                                      if($record->quantity <= $record->threshold){
                                        echo "Buy";
                                      }else{
                                        echo "No";
                                      }
                                   ?>
                                 </td>
                                 <td><a href="/location/{{$record->location->id}}"><?php echo ucfirst($record->location->location);?></a></td>
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
