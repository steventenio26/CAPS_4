<!-- Modal add class -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="plus-circle"></span>
        Add Class</h6>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
          <label for="exampleFormControlSelect1">Class Name: </label>
          <select class="form-control custom-select" name="class_id" id="exampleFormControlSelect1" required>
            <option> </option>
            <?php
            $query = mysqli_query($conn,"SELECT * FROM class ORDER BY class_name");
            while($row = mysqli_fetch_array($query)){
            ?>
            <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
            <?php } ?>
          </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Subject: </label>
          <select class="form-control custom-select" name="subject_id" id="exampleFormControlSelect2" required>
            <option> </option>
            <?php
            $query = mysqli_query($conn,"SELECT * FROM subject ORDER BY subject_code");
            while($row = mysqli_fetch_array($query)){
            
            ?>
            <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?></option>
            <?php } ?>
          </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">School Year: </label>
            <?php
            $query = mysqli_query($conn,"SELECT * FROM school_year order by school_year DESC");
            $row = mysqli_fetch_array($query);
            ?>
            <input type="text" class="form-control" name="school_year" id="formGroupExampleInput2" value="<?php  echo $row['school_year']; ?>" readonly>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="addclass" class="btn btn-outline-success"><span data-feather="save"></span>
        Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal -->