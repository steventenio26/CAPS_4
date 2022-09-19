<!-- Modal add class -->
<div class="modal fade" id="delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="edit-2"></span>
          Delete <?php echo $delete_header;?></h6>
        </div>
        <div class="modal-body">
            <p class="text-dark">
              Are you sure you want to delete this <?php echo $delete_content;?>?
            </p>            
            <input type="hidden" name="id" value="<?php echo $id;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light text-secondary" data-dismiss="modal">Cancel</button>
          <button name="delete" class="btn btn-outline-light text-danger"><span data-feather="trash-2"></span>
          Delete</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
<!-- end of modal -->