
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header" style="margin-left:13px">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home" style="margin:0px; padding:0px">
           <img class="img-responsive" src="/images/logomain.png" style="height:100%"/>
        </a>

    </div>

    <!-- Top Menu Items -->
    <ul class="nav navbar-nav navbar-right">

       <li class="dropdown" style="padding-right:20px;"><a  style="margin-right:13px" class="dropdown-toggle " id="log" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user">   </span> Hi {{ Auth::user()->first_name }}<span class="caret"></span></a>
         </a>
         <ul class="dropdown-menu">
           <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
         </ul>
       </li>

     </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-default navbar-ex1-collapse  overflow-y: scroll;" >
        <ul class="nav navbar-nav side-nav navbar-default  overflow-y: scroll;"  style="border-right:1px solid lightgrey;overflow-y: scroll;">

          <!-- ========================New Collapse=================================== -->

          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a style="font-size:larger" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Categories
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="list-group">
                    <ul class="list-group">
                      <?php
                        $sorted_categories = array();
                        foreach($categories as $category) {
                          $sorted_categories[$category->id]=$category->category;
                        }
                        asort($sorted_categories);

                      ?>
                      @foreach($sorted_categories as $id => $category)
                      <li class="list-group-item">
                        <a href="/show_items/{{$id}}" ><?php echo ucfirst($category)?></a>
                      </li>
                      @endforeach

                    </ul>
                    <div class="panel-footer">
                      <a class="btn btn-primary btn-sm" href="/add_category" role="button">Add Category</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a style="font-size:larger" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Storage Locations
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="list-group">
                    <ul class="list-group">
                      <?php
                        $sorted_locations = array();
                        foreach($locations as $location) {
                          $sorted_locations[$location->id]=$location->location;
                        }
                        asort($sorted_locations);

                      ?>

                      @foreach($sorted_locations as $id => $location)
                      <li class="list-group-item">
                        <a href="/location/{{$id}}" ><?php echo ucfirst($location)?></a>
                      </li>
                      @endforeach

                    </ul>
                    <div class="panel-footer">
                      <a class="btn btn-primary btn-sm" href="/add_location" role="button">Add Location</a>
                    </div>
                  </div>
                </div>
              </div>

              </div>
              <div class="panel panel-default">
                <div class="panel-heading" >
                  <a href="/vendors"><h4 class="panel-title" style="font-size:larger">Vendors</h4></a>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" >
                  <a href="/showBills"><h4 class="panel-title" style="font-size:larger">Bills</h4></a>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" >
                  <a href="/showUnits"><h4 class="panel-title" style="font-size:larger">Unit</h4></a>
                </div>
              </div>


              <div class="panel panel-default">
                <div class="panel-heading" >
                  <a href="/showTrash"> <h4 class="panel-title" style="font-size:larger"><span class="glyphicon glyphicon-trash"></span> Trash</h4></a>
                </div>
              </div>


        </ul>

    </div>
    <!-- /.navbar-collapse -->
</nav>
