<!-- Modal delete quiz class -->
<div class="modal fade" id="delete_question<?php echo $question_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="action.php?id=<?php echo $question_id.'&exam_id='.$get_id;?>" method="post">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="trash-2"></span>
          Delete Question?</h6>
        </div>
        <div class="modal-body">
            <p class="text-dark">
              Are you sure you want to delete question number <?php echo $row['question_no']; ?>?
            </p>
            <h6 class="text-dark text-center"><?php echo $row['question_text'];?></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light text-secondary" data-dismiss="modal">Cancel</button>
          <button name="delete_question" class="btn btn-outline-light text-danger"><span data-feather="trash-2"></span>
          Delete</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
<!-- end of modal -->
<!-- Modal edit quiz question -->
<div class="modal" id="edit<?php echo $question_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="edit-2"></span>
        Edit Question No. <?php echo $row['question_no']; ?></h6>
      </div>
      <form action="action.php?id=<?php echo $question_id.'&quiz_id='.$get_id;?>" method="post">
        <div class="modal-body">
          <div class="form-group">
                <label>Question</label>
                <input type="text" class="form-control" name="question" value="<?php echo $row['question'];?>">
                <label>Answer</label>
                <input type="text" class="form-control" name="answer" value="<?php echo $row['answer'];?>">
                <label>Option 1</label>
                <input type="text" class="form-control" name="option1" value="<?php echo $row['opt1'];?>">
                <label>Option 2</label>
                <input type="text" class="form-control" name="option2" value="<?php echo $row['opt2'];?>">
                <label>Option 3</label>
                <input type="text" class="form-control" name="option3" value="<?php echo $row['opt3'];?>">
                <label>Option 4</label>
                <input type="text" class="form-control" name="option4" value="<?php echo $row['opt4'];?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light text-dark" data-dismiss="modal">Cancel</button>
          <button name="update_question_exam" class="btn btn-outline-info"><span data-feather="save"></span>
          Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal -->