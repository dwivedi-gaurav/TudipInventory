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

  <!-- Bootstrap Date-Picker Plugin -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <script src="/js/myJS.js"></script>

  <!--Datepicker.............. -->
  <script type="text/javascript">
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
  })
  </script>
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
                                  <div class="panel-heading"><h3>Update <?php echo ucfirst($item->item)?> [<?php echo $item->quantity;
                                  if(count($item->unit)!=0){
                                    echo '('.ucfirst($item->unit->unit).')';
                                  }?> at hand]</h3></div>
                                  <div class="panel-body">

                                    <form action="/update" id="updateForm" method="post" onsubmit="return validate_updateItems()">
                                      {{csrf_field()}}
                                      <span id="helpBlockUpdateQuantity" class="help-block noMargin noPadding " style="color:red"></span>
                                      @include('errors.display')
                                      @include('errors.flash')
                                      <div class="form-group">
                                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity">
                                      </div>
                                      <span id="helpBlockDescription" class="help-block noMargin noPadding " style="color:red"></span>

                                      <div class="form-group">
                                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Notes"></textarea>
                                      </div>
                                      <div class="form-group updateType">
                                          <label class="radio-inline">
                                              <input type="radio" name="update_type" id="purchased" checked value="purchased"> Purchased
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="update_type" id="used" value="used"> Used
                                          </label>
                                      </div>
                                      <!-- Date -->
                                      <div class="form-group">
                                        <span id="helpBlockDate" class="help-block noMargin noPadding " style="color:red"></span>

                                        <input class="form-control" id="date" name="date" placeholder="<?php echo date('Y-m-d');?>" type="text"/>
                                      </div>
                                      <div class="form-group" id="billBox">
                                        <span id="helpBlockUnitPrice" class="help-block noMargin noPadding " style="color:red"></span>

                                        <input type="text" class="form-control" name="unitPrice" id="unitPrice" placeholder="Enter Unit Price">
                                        <!-- billno -->
                                        <span id="helpBlockBillNo" class="help-block noMargin noPadding " style="color:red"></span>
                                        <span style="color:green"><a href="/add_bill">Click here </a>to add bill.</span>
                                        <input type="number" class="form-control" name="billNo" id="billNo" placeholder="Enter bill number">
                                      </div>
                                      <input type="hidden" name="item_id" value="{{$item->id}}">
                                      <input type="hidden" name="category_id" value="{{$category->id}}">
                                      <div style="text-align:right">
                                        <a class="btn btn-primary" href="/show_items/{{$category->id}}" role="button">Cancel</a>
                                        <button type="submit" class="btn btn-primary" style="margin-left:8px">Update</button>
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
