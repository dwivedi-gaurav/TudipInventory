<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm" style="margin-top:20px">Delete <?php echo ucfirst($cat->category)?> category</button>

  <!-- Modal -->
  <div id="confirm" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete <?php echo ucfirst($cat->category)?> category?</h4>
      </div>
      <div class="modal-footer">
        <div class="col-md-2 col-md-offset-8 col-sm-2 col-sm-offset-8 col-xs-3 col-xs-offset-6">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-3">
          <form  action="/delete_category" method="post">
            {{csrf_field()}}
            <input type="hidden" name="category" value="{{$cat->id}}">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
