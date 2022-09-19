  <?php include('bootstrapandjquery.php'); ?>
    <?php  include('session.php'); ?>
		<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbarmain.php'); ?>
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
		 <div class="col-3">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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
			
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
			 <?php
                            if (isset($_POST['save'])) {
                           
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $department_id = $_POST['department'];
								
								
								$query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
								$count = mysqli_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Data Already Exist');
								</script>
								<?php
								}else{

                                mysqli_query($conn,"insert into teacher (firstname,lastname,location,department_id, teacher_status, teacher_stat)
								values ('$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$department_id','Unregistered','Activated')         
								") or die(mysqli_error()); ?>
								<script>
							 	window.location = "teachers1.php"; 
								</script>
								<?php   }} ?>
            </div>
		 </div>
          <div class="col-9">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teachers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			    <form method="post" id="import_excel">
				<label>Import excel</label><br>
				<input type = "file" name="excel_file" id="excel_file">
				</form>
			  <form action="delete_teacher.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete Teacher
                </button>
				<?php include('modal_delete_teacher.php'); ?>
				 
                  <thead>
                  <tr>
                                    <th>select</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Username</th>
										<th>Status</th>

                                    <th>edit</th><th></th>
                                </tr>
                  </thead>
                  <tbody>
                <?php
                                    $teacher_query = mysqli_query($conn,"select * from teacher") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($teacher_query)) {
                                    $id = $row['teacher_id'];
									$teacher_status = $row['teacher_status'];
                                    $teacher_stat = $row['teacher_stat'];
                                        ?>
									<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                    <td width="40"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td> 
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
                                    <td><?php echo $row['username']; ?></td> 
                                <?php if ($teacher_status == 'Registered' ){ ?>
									<td width="120"><span class="badge badge-success">Registered</span></td>
									<?php }else{ ?>
									<td width="120"><span class="badge badge-danger">Unregistered</span></td>

									<?php } ?>
									<td width="50"><a href="edit_teacher1.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>		
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

  <?php include('footer1.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
