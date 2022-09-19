  <?php include('header.php'); ?>
    <?php  include('session.php'); ?>
	<?php $get_id = $_GET['id']; ?>
		<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
   <?php include('edit_department_sidebar.php'); ?>
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
                <h3 class="card-title">Edit Department</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
			  	<?php 
							$query = mysqli_query($conn,"select * from department where department_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
              $teacher_id = $row['teacher_id'];
							?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Department</label>
                    <input value="<?php echo $row['department_name']; ?>" name="d" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Person Incharge</label>
                    <select class="form-control" name="dn">
                      <?php
                      $query2 = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$teacher_id'");
                      $row1 = mysqli_fetch_array($query2);
                      $fullname = ucwords($row1['firstname']).' '.ucwords($row1['lastname']);
                      ?>
                      <option value="<?php echo $row1['teacher_id']; ?>"><?php echo $fullname; ?></option>
                      <?php
                      $query1 = mysqli_query($conn, "SELECT * FROM teacher WHERE department_id = '$get_id' AND NOT teacher_id = '$teacher_id' ORDER BY firstname ASC");
                      while ($row = mysqli_fetch_array($query1)){
                        $teacher_id = $row['teacher_id'];
                        $fullname = ucwords($row['firstname']).' '.ucwords($row['lastname']);
                        $sql = mysqli_query($conn, "SELECT * FROM teacher_class WHERE teacher_id = '$teacher_id'");
                        $row_teacher = mysqli_fetch_array($sql);
                        $teacher_class_id = $row_teacher['teacher_id'];
                        $sql1 = mysqli_query($conn, "SELECT * FROM department WHERE teacher_id = '$teacher_id'");
                        $row_dep = mysqli_fetch_array($sql1);
                        $department_teacher_id = $row_dep['teacher_id'];
                        if ($teacher_id != $teacher_class_id && $teacher_id != $department_teacher_id){
                      ?>
                      <option value="<?php echo $teacher_id; ?>"><?php echo $fullname; ?></option>
                      
                      <?php 
                      } }
                      if (mysqli_num_rows($query2) > 0){
                      ?>
                      <option value=""></option>
                      <?php } ?>
                    </select>
                  </div>
				
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				<a href="department.php" class="btn btn-warning mr-2">Cancel</a>
                  <button name="update" class="btn btn-primary">Update</button>
                </div>
              </form>
			  <?php
 if (isset($_POST['update'])){
 

 $dn = $_POST['dn'];
 $d = $_POST['d'];
 
 mysqli_query($conn,"update department set department_name = '$d' , teacher_id  = '$dn' where department_id = '$get_id' ")or die(mysqli_error());
 ?>
 <script>
 window.location='department.php'; 
 </script>
 <?php 
 }
 ?>
            </div>
		 </div>
          <div class="col-7">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subjects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_department.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete Department
                </button>
				<?php include('modal_delete_department.php'); ?>
				 
                  <thead>
                  <tr>
                  			<th>Select</th>
												<th>Department</th>
												<th>Person In-charge</th>
											
												<th>Edit</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
            <?php
												$user_query = mysqli_query($conn,"select * from department")or die(mysqli_error());
                        while($row = mysqli_fetch_array($user_query)){
                        $id = $row['department_id'];
                        $teacher_id = $row['teacher_id'];
                        $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$teacher_id' ");
                        $row_teacher = mysqli_fetch_array($query);
                        $fullname = ucwords($row_teacher['firstname'].' '.ucwords($row_teacher['lastname']));
                        ?>
                
                        <tr>
                          <td width="30">
                          <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                          </td>
                          <td><?php echo $row['department_name']; ?></td>
                          <td><?php echo $fullname; ?></td>
												
														<td width="30"><a href="edit_department.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>

                               
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
