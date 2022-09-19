 <div id="<?php echo $id; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Message</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-warning alert-dismissible">
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Warning!</h5>
                  Are you sure you want to delete thid message?
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button id="<?php echo $id; ?>" type="button" class="btn btn-primary">Yes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>