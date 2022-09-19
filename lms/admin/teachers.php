<?php include('header.php'); ?>
    <?php  include('session.php'); ?>
  
   
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
  <?php include('navbarmain.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <?php include('modal_add_teacher.php'); ?>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php include('modal_import_teacher.php'); ?>
          <div class="col-12">
         
      <?php
                if(isset($_SESSION['message']))
                {
                  echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Alert!</h5>"
                  .$_SESSION['message']." </div>";
                    unset($_SESSION['message']);
                }else if(isset($_SESSION['message1']))
                {
                  echo "<div class='alert alert-warning alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Alert!</h5>"
                  .$_SESSION['message1']." </div>";
                unset($_SESSION['message1']);
                }else if(isset($_SESSION['message2']))
                {
                  echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Alert!</h5>"
                  .$_SESSION['message2']." </div>";
                  unset($_SESSION['message2']);
                  }
                ?>
     <div class="card">
               <div class="card-header">
                <h3 class="card-title">Teachers</h3>
              </div>  
              <div class="card-body">
			  <form action="delete_teacher.php" method="post">
			   <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addteacher">
                  <i class="fa fa-trash"></i>Add Teacher(Manual)
                </button>
				<button type="button" class="btn btn-success mb-2 ml-2" data-toggle="modal" data-target="#teacher">
                  <i class="fas fa-file-excel"></i>Import Excel</button>
                <a href="pass_gen_teacher.php" class="btn btn-warning mb-2 ml-2 float-right"><i class="fa fa-key"></i>Generate Password</a>
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2 ml-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete Teacher
                </button>
                
				<?php include('modal_delete_teacher.php'); ?>
				 
                  <thead>
                 <tr>
                                    <th>select</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Department</th>
								                  	<th>Email</th>	               
                                    <th>Password</th>

                                    <th>edit</th><th></th>
                                </tr>
                  </thead>
                  <tbody>
                <?php
                                    $teacher_query = mysqli_query($conn,"select teacher.teacher_id as tid, department.department_name as department, username, password, default_password, firstname, lastname, teacher.department_id, email, location,teacher_stat, pass_stat from teacher LEFT JOIN department ON teacher.department_id = department.department_id") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($teacher_query)) {
                                    $id = $row['tid'];
									
                                    $pass_stat = $row['pass_stat'];
                                    $teacher_stat = $row['teacher_stat'];
                                        ?>
									<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                    
										</td>
                                    <td width="40"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td> 
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
                                    <td><?php echo $row['username']; ?></td> 
                            <td><?php echo $row['department']; ?></td> 
									 <td><?php echo $row['email']; ?></td> 
								<?php if ($pass_stat == 'Default' ){ ?>
									<td style='background-color:#f00; color:#fff;' width="100"><?php echo $row['password']; ?></td>
									<?php }elseif ($pass_stat == 'Updated' ){ ?>
									<td style='background-color:#fcba03;'><i class="fa fa-eye-slash" aria-hidden="true"></i>Password encrypted<h1 class="text-xs">(<i class="fa fa-lock" aria-hidden="true"></i>Updated by user)</h1></td>
									<?php }elseif ($pass_stat == 'N/A' ){ ?>
									<td style='background-color:#c7c5c1;'>No Password available<h1 class="text-xs">(not yet generated)</h1></td>							
									<?php } ?>
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
</div>
<!-- ./wrapper -->

</body>
</html>
