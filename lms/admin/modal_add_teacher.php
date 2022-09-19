<div class="modal fade" id="addteacher">
           <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Teacher</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post">
                <div class="card-body">
				 <div class="form-group">
                     <label>Department</label>
                        <select name="department"  class="form-control" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from department order by department_name");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="firstname" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" name="lastname" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="">
                  </div>
					  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"  placeholder="">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
			 <?php
                            if (isset($_POST['save'])) {
                                $username = $_POST['username'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $department_id = $_POST['department'];
							                	 $email = $_POST['email'];
								
								$query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
								$count = mysqli_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Data Already Exist');
								</script>
								<?php
								}else{
								mysqli_query($conn,"insert into teacher (firstname,lastname,username,location,department_id, email, teacher_stat, pass_stat)values ('$firstname','$lastname','$username','uploads/NO-IMAGE-AVAILABLE.jpg','$department_id','$email','Activated','N/A')") or die(mysqli_error()); ?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>