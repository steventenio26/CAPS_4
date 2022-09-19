 <?php include('bootstrapandjquery.php'); ?>
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
                <h3 class="card-title">classes created by teacher</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_subject.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 
                  <thead>
                  <tr>
                  						
												
												<th>teacher name</th>
												<th>Class</th>
												<th>sub code</th>
												<th>sub title</th>
												<th> view</th>
                                   
                   
                    
                  </tr>
                  </thead>
                  <tbody>
               	<?php
										$query = mysqli_query($conn," SELECT * from teacher_class
    LEFT JOIN class ON class.class_id = teacher_class.class_id
    LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id")or die(mysqli_error());
	
										while($row = mysqli_fetch_array($query)){
										$teacherc =$row['teacher_class_id'];
										
									?>
										<tr>
										
                                    
                                                                         
                                         <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                         <td><?php echo $row['class_name']; ?></td>
										 <td><?php echo $row['subject_code']; ?></td>
										 <td><?php echo $row['subject_title']; ?></td>
											<td>   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#view<?php echo $teacherc;?>">
                  view
                </button>
				<?php include "modal.php";?>
				</td>
                               
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
