<!-- Modal delete exam -->
<div class="modal fade" id="exam_delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="alert-octagon"></span>
          Warning!</h6>
        </div>
        <div class="modal-body">
            <p class="text-dark">
              Are you sure you want to delete this exam?
            </p>
            <p class="alert alert-danger text-dark text-center">
            If you delete this quiz you also delete the deploy exam
            </p>
            <h6 class="text-dark text-center"><?php echo $quiz_title;?><br>
            <small class="text-secondary"><?php echo $description;?></small></h6>
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

<!-- Modal edit exam -->
<div class="modal" id="exam_response<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle1"><span data-feather="edit-2"></span>
        Edit Exam</h6>
      </div>
      <form action="action.php?id=<?php echo $id;?>" method="post">
        <div class="modal-body">
          <div class="form-group">
                <label for="id">Exam Title</label>
                <input type="text" class="form-control" id="id" name="quiz_title" value="<?php echo $quiz_title;?>">
                <label for="txt">Exam Description</label>            
                <textarea id="txt"class="form-control" rows="3" name="content"><?php echo $description; ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light text-dark" data-dismiss="modal">Cancel</button>
          <button name="update_exam" class="btn btn-outline-info"><span data-feather="save"></span>
          Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal -->


<!-- Modal add quiz to class -->
<div class="modal fade" id="exam_deploy<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Exam Title: </label>
                      <input type="text" class="form-control" value="<?php echo $quiz_title;?>" name="quiz_title" id="exampleInputEmail1" readonly>
                      <input type="hidden" class="form-control" value="<?php echo $id;?>" name="quiz_id">
                  </div>                  
                  <div class="form-group">
                      <label for="exampleInputEmail1">Exam Time (in minutes): </label>
                      <input type="text" class="form-control" name="time" id="exampleInputEmail1" placeholder="...">
                  </div>
                  <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Deadline: </label>
                      <input type="text" class="form-control" name="time" id="exampleInputEmail1" placeholder="...">
                  </div> -->
                  <?php $query1 = mysqli_query($conn,"SELECT * from teacher_class LEFT JOIN class ON class.class_id = teacher_class.class_id LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id WHERE teacher_id = '$session_id' AND school_year = '$school_year' ")or die(mysqli_error());	
								  	while($row = mysqli_fetch_array($query1)){
										$id = $row['teacher_class_id'];
				
										?>
                  <div class="form-check text-justify">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="sel[]" value="<?php echo $id;?>"><?php echo 'Section: <b>'.$row['class_name'].'</b> Subject: <b>'.$row['subject_code'].'</b>';?>
                    </label>
                  </div><?php } ?>                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-light text-secondary" data-dismiss="modal">Close</button>
                    <button name="add" class="btn btn-sm btn-outline-light text-success"><span data-feather="check"></span> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal -->
