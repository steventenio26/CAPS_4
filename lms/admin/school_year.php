<?php include('header.php'); ?>
    <?php  include('session.php'); ?>
		<!DOCTYPE html>
<html lang="en">
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
		 <div class="col-4">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add School Year</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
				
                  <div class="form-group">
                    <label>School Year</label>
                    <input type="text" name="school_year" class="form-control"  placeholder="">
                  </div>
			
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
			
            </div>
		 </div>
          <div class="col-8">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">School Year</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_sy.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete School Year
                </button>
				<?php include('modal_delete_SY.php'); ?>
				 
                  <thead>
                  <tr>
                                  <th></th>
												<th>School Year</th>
												 <th>Edit</th>
                                   
                                </tr>
                  </thead>
                  <tbody>
             <?php
													$user_query = mysqli_query($conn,"select * from school_year")or die(mysqli_error());
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['school_year_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['school_year']; ?></td>
	
												
											
												<td width="40">
												<a href="edit_school_year.php<?php echo '?id='.$id; ?>"  class="btn btn-success"><i class="fas fa-edit"></i></a>
												</td>
		
									
												</tr>
												<?php } ?>
                  </tbody>
                
                </table>
				</form>
				<?php
if (isset($_POST['save'])){
$school_year = $_POST['school_year'];



$query = mysqli_query($conn,"select * from school_year where school_year = '$school_year'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into school_year (school_year) values('$school_year')")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add School Year $school_year')")or die(mysqli_error());
?>
<script>
window.location = "school_year.php";
</script>
<?php
}
}
?>
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
