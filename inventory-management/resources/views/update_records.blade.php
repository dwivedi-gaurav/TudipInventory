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
        "order": [[ 4, "desc" ]]
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

    <div class="container-fluid " ><!--Content-->
            <div class="row" >
                  <div class="col-md-12">
                    <div class="col-md-4" style="padding-left:0px">
                        <h3>
                          <?php echo ucfirst($item->item)?> [{{$item->quantity}}<?php if(count($item->unit)!=0){
                            echo '('.ucfirst($item->unit->unit).')';
                          }?> at hand] in
                           <a href="/show_items/{{$item->category->id}}">
                             {{$item->category->category}}
                           </a>
                        </h3>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4 " style="padding-top:20px; padding-left:0px" >
                      <a class="btn btn-primary btn-sm" href="/change_location/{{$item->location->id}}/{{$item->id}}" role="button">Change storage</a>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4 " style="padding-top:20px; padding-left:0px" >
                      <a class="btn btn-primary btn-sm" href="/change_category/{{$item->category->id}}/{{$item->id}}" role="button">Edit Category</a>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4 " style="padding-top:20px; padding-left:0px" >
                      <a class="btn btn-primary btn-sm" href="/update/{{$item->category->id}}/{{$item->id}}" role="button">Purchased/Used</a>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-4" style=" padding-left:0px">
                        @include('layouts.deleteItem')
                    </div>
                  </div>

            </div>
            <div class="row">
                <h4 style="margin-left:15px;margin-bottom: 20px;">Storage: <?php echo ucfirst($item->location->location);?></h4>
            </div>
              <!-- <h4 style="margin-left:15px"></h4> -->

            @if(count($updates)==0)
              <h3>Ooops! No record available.</h3>
              <?php exit()?>
            @endif

            <div style="overflow-x:auto">

              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">

                      <table class="table table-hover table-bordered " id="records">
                          <thead>
                              <tr>
                                  <th>Quantity</th>
                                  <th>Update Type</th>
                                  <th>Bill number</th>
                                  <th>Unit Price</th>
                                  <th>Date</th>
                                  <th>User</th>

                                  <th>Notes</th>
                              </tr>
                         </thead>
                         <tbody>

                             @foreach($updates as $update)
                               <tr>
                                 <td style="text-align:right">
                                   <?php
                                      if($update->update_type=="purchased"){
                                        echo "+" ;
                                      }else if($update->update_type=="used"){
                                        echo "-";
                                      }
                                   ?>
                                   {{$update->quantity}}
                                 </td>
                                 <td><?php echo ucfirst($update->update_type)?></td>
                                 <td>
                                    <?php
                                      if($update->bill_number==""){
                                        echo "NA";
                                      }else{
                                        echo "TudipBill-".$update->bill_number;
                                      }
                                    ?>
                                 </td>
                                 <td style="text-align:right">
                                    <?php
                                      if($update->unit_price==""){
                                        echo "NA";
                                      }else{
                                        echo $update->unit_price;
                                      }
                                    ?>
                                 </td>

                                 <td><?php
                                        if($update->added_on==""){
                                          echo $update->created_at->toFormattedDateString();
                                        }else{
                                          echo $update->added_on->toFormattedDateString();
                                        }
                                      ?>
                                </td>
                                 <td><?php echo ucfirst($update->user->first_name)." ".ucfirst($update->user->last_name)?></td>

                                 <td><?php echo ucfirst($update->description)?></td>
                               </tr>
                             @endforeach
                         </tbody>
                      </table>
                 </div>
              </div>
            </div>


      </div><!--End Content-->

</div>

</body>
</html>
