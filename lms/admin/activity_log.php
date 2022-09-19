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
	
          <div class="col-12">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Activity Log</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_subject.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 
                  <thead>
                  <tr>
                  <th>Date</th>
												<th>User</th>
												<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
         	<?php
										$query = mysqli_query($conn,"select * from  activity_log")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>
							

					
                              
										<tr>

                                         <td><?php  echo $row['date']; ?></td>
                                         <td><?php echo $row['username']; ?></td>
                                         <td><?php echo $row['action']; ?></td>
                                  
                               
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
