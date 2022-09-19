<!-- Modal add class -->
<div class="modal" id="edit_question<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="edit-2"></span>
        Edit Question</h6>
      </div>
      <form action="action.php?id=<?php echo $id;?>" method="post">
        <div class="modal-body">
          <div class="form-group">
                <label for="id">Quiz Title</label>
                <input type="text" class="form-control" id="id" name="quiz_title" value="<?php echo $quiz_title;?>">
                <label for="txt">Quiz Description</label>            
                <textarea id="txt"class="form-control" rows="3" name="content"><?php echo $description; ?></textarea>
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