<!-- Modal -->
<div class="modal fade" id="add<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <form action="" method="post">
      <div class="modal-content">
      <div class="modal-body">
        <p>Are you sure you want to add this student?</p>
        <p class="text-center h6"><?php echo $fullname;?></p>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="full" value="<?php echo $fullname; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-light text-secondary" data-dismiss="modal">Close</button>
        <button name="add" class="btn btn-sm btn-outline-light text-success"><span data-feather="check"></span> Add</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- end of modal -->