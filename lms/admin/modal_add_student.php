      <div class="modal fade" id="addstudent">
           <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="add_student" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Class</label>
                    <div class="form-group">
                    <select  name="class_id" class="form-control" required>
                                             	<option></option>
											<?php
											$cys_query = mysqli_query($conn,"select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>ID Number</label>
                    <input type="text" name="un" class="form-control"  placeholder="">
                  </div> <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="fn" class="form-control"  placeholder="">
                  </div> <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" name="ln" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"  placeholder="">
                  </div>
				
                </div>
                <!-- /.card-body -->
              
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button name="save" class="btn btn-primary">Save</button>
            </div>
			 </form>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
	   <?php
											if (isset($_POST['save'])){
										$un = $_POST['un'];
										$fn = $_POST['fn'];
										$ln = $_POST['ln'];
										$class_id = $_POST['class_id'];
                    $email = $_POST['email'];
										
										
										$query = mysqli_query($conn,"select * from student where username = '$un' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into student (username,firstname,lastname,email,location,class_id,pass_stat)
										values ('$un','$fn','$ln','$email','uploads/user.png','$class_id','N/A')                                    
										") or die(mysqli_error()); 
										
										
										mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add Student $un')")or die(mysqli_error());
										
										
										?>
										<script>
										alert('Student Added Successfully');
										</script>
										<script>
										window.location = "students.php";
										</script>
										<?php
										}
										}
										
										?>