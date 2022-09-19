  <?php include('header.php'); ?>
    <?php  include('session.php'); ?>
	<?php $get_id = $_GET['id']; ?>
		<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('edit_teacher_sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		 <div class="col-4">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
			  <?php
									$query = mysqli_query($conn,"select * from teacher where teacher_id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
                <div class="card-body">
				 <div class="form-group">
                     <label>Department</label>
                    <select name="department"  class="form-control" required>
											<?php
											$query_teacher = mysqli_query($conn,"select * from teacher join  department")or die(mysqli_error());
											$row_teacher = mysqli_fetch_array($query_teacher);
											
											?>
											
                                             	<option value="<?php echo $row_teacher['department_id']; ?>">
												<?php echo $row_teacher['department_name']; ?>
												</option>
											<?php
											$department = mysqli_query($conn,"select * from department order by department_name");
											while($department_row = mysqli_fetch_array($department)){
											
											?>
											<option value="<?php echo $department_row['department_id']; ?>"><?php echo $department_row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                  </div>
                  <div class="form-group">
                    <label>Firstname</label>
                    <input value="<?php echo $row['firstname']; ?>" name="firstname" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Lastname</label>
                    <input value="<?php echo $row['lastname']; ?>"  name="lastname" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input value="<?php echo $row['username']; ?>"  name="username" class="form-control"  placeholder="">
                  </div>
					 <div class="form-group">
                    <label>Email</label>
                    <input value="<?php echo $row['email']; ?>" input type="email" name="email" class="form-control"  placeholder="">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				<a href="teachers.php" class="btn btn-warning mr-2">Cancel</a>
                  <button name="update" class="btn btn-primary">Update</button>
                </div>
              </form>
			  <?php
                            if (isset($_POST['update'])) {
                       
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $department_id = $_POST['department'];
                                $username = $_POST['username'];
								                $email = $_POST['email'];
								
								$query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
								$count = mysqli_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Data Already Exist');
								</script>
								<?php
								}else{
								
								mysqli_query($conn,"update teacher set firstname = '$firstname' , lastname = '$lastname' , username = '$username', department_id = '$department_id', email=' $email' where teacher_id = '$get_id' ")or die(mysqli_error());	
								
								?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>
            </div>
		 </div>
          <div class="col-8">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teachers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_teacher.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete Teacher
                </button>
				<?php include('modal_delete.php'); ?>
				 
                  <thead>
                  <tr>
                                    <th>select</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Username</th>
									                  <th>Email</th>
                                    <th>edit</th><th></th>
                                </tr>
                  </thead>
                  <tbody>
                <?php
                                    $teacher_query = mysqli_query($conn,"select * from teacher") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($teacher_query)) {
                                    $id = $row['teacher_id'];
                                    $teacher_stat = $row['teacher_stat'];
                                        ?>
									<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                    <td width="40"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td> 
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
                                    <td><?php echo $row['username']; ?></td> 
									<td><?php echo $row['email']; ?></td> 
									<td width="50"><a href="edit_teacher.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>		
									<?php if ($teacher_stat == 'Activated' ){ ?>
									<td width="120"><a href="de_activate.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-remove"></i> Deactivate</a></td>
									<?php }else{ ?>
									<td width="120"><a href="activate.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-check"></i> Activated</a></td>
							
									<?php } ?>
                                </tr>
                            <?php } ?>
                               
                  </tbody>
                
                </table>
				</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
