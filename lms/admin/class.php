<?php include('header.php'); ?>
    <?php  include('session.php'); ?>
		<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

</head>
<body class="hold-transition  sidebar-mini layout-navbar-fixed">
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
		 <div class="col-5">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Class</label>
                    <input name="class_name" class="form-control" placeholder="">
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
			  <?php
if (isset($_POST['save'])){
$class_name = $_POST['class_name'];


$query = mysqli_query($conn,"select * from class where class_name  =  '$class_name' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
$.notify("Data Already Exist!", "error");
</script>
<?php
}else{
mysqli_query($conn,"insert into class (class_name) values('$class_name')")or die(mysqli_error());
?>
<script>
$.notify("Class added successfully!", "success");
</script>
<?php
}
}
?>
		
            </div>
		 </div>
          <div class="col-7">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_class.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete Class
                </button>
				<?php include('modal_delete_class.php'); ?>
				 
                  <thead>
                  <tr>
                    <th>Select to Delete</th>
                    <th>Grade And Section</th>
                    <th>Edit</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
                <tr>
				<?php
										$class_query = mysqli_query($conn,"select * from class")or die(mysqli_error());
										while($class_row = mysqli_fetch_array($class_query)){
										$id = $class_row['class_id'];
										?>
                 
					<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $class_row['class_name']; ?></td>
											<td width="40"><a href="edit_class.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a></td>
                                     
					
					
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
