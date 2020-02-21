 <?php include_once 'header.php'; ?>
 <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" action="category-data.php" method="POST">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Add new category</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="catname" class="control-label col-md-4">Category name</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="catname" id="catname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="catdesc" class="control-label col-md-4">Category description</label>
                  <div class="col-md-8">
                    <textarea type="text" class="form-control" name="catdesc" id="catdesc"></textarea>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div><!-- /col-md-2 -->