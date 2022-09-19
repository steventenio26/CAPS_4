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
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
	
          <div class="col-12">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Downloadable Materials</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_subject.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 
                  <thead>
                  <tr>
                   <th>Date Upload</th>
												<th>File Name</th>
												<th>Description</th>
												<th>Upload By</th>
												<th>Class</th>
                                   
                   
                    
                  </tr>
                  </thead>
                  <tbody>
               	<?php
										$query = mysqli_query($conn,"select * FROM files LEFT JOIN teacher ON teacher.teacher_id = files.teacher_id 
																				  LEFT JOIN teacher_class ON teacher_class.teacher_class_id = files.class_id 
																				  INNER JOIN class ON class.class_id = teacher_class.class_id  ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>
										<tr>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                         <td><?php echo $row['class_name']; ?></td>

                               
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
