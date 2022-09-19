
  <?php include('header.php'); ?>
    <?php  include('session.php'); ?>
	<?php $get_id = $_GET['id']; ?>
	
<html lang="en">

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('edit_student_sidebar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

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
                <h3 class="card-title">Edit Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_student" method="post">
			  <?php
							$query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id where student_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Grade & Section</label>
                    <div class="form-group">
                     <select  name="cys" class="form-control" required>
                                             	<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
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
                    <input name="un" value="<?php echo $row['username']; ?>" class="form-control"  placeholder="">
                  </div> <div class="form-group">
                    <label>Firstname</label>
                    <input name="fn"  value="<?php echo $row['firstname']; ?>" class="form-control"  placeholder="">
                  </div> <div class="form-group">
                    <label>Lastname</label>
                    <input name="ln"  value="<?php echo $row['lastname']; ?>" class="form-control"  placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email"  value="<?php echo $row['email']; ?>" class="form-control"  placeholder="">
                  </div>
				
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				<a href="students.php" class="btn btn-warning mr-2">Cancel</a>
                  <button name="update" class="btn btn-primary">Update</button>
                </div>
              </form>
			     <?php
                            if (isset($_POST['update'])) {
                               
                                $un = $_POST['un'];
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $cys = $_POST['cys'];
                                $email = $_POST['email'];
                      

								mysqli_query($conn,"update student set username = '$un' , firstname ='$fn' , lastname = '$ln', email='$email' , class_id = '$cys' where student_id = '$get_id' ")or die(mysqli_error());

								?>
 
								<script>
								window.location = "students.php"; 
								</script>

                       <?php     }  ?>
            </div>
		 </div>
          <div class="col-9">
      <div class="table" id="studentTableDiv1">
									<?php include('edit_student_table.php'); ?>
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
