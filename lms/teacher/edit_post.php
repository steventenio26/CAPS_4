<!-- Modal add class -->
<div class="modal" id="response<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="edit-2"></span>
        Edit Post</h6>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id;?>">            
              <textarea class="form-control" name="context" rows="6"><?php echo $edit_content_txt; ?>
              </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light text-dark" data-dismiss="modal">Cancel</button>
          <button name="update" class="btn btn-outline-info"><span data-feather="save"></span>
          Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal -->