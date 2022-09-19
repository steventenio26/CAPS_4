<?php include('header.php'); ?>
<?php  include('session.php'); ?>
<html lang="en">
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
<?php include('navbarmain.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">   
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assignments</h3>
              </div>
              <div class="card-body">
			  <form action="delete_subject.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>File Name</th>
					<th>Description</th>
					<th>Date Upload</th>
					<th>Upload By</th>
					<th>Class</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
					$query = mysqli_query($conn,"select * FROM assignment LEFT JOIN teacher ON teacher.teacher_id = assignment.teacher_id 
						LEFT JOIN teacher_class ON teacher_class.teacher_class_id = assignment.class_id 
						INNER JOIN class ON class.class_id = teacher_class.class_id  ")or die(mysqli_error());
						while($row = mysqli_fetch_array($query)){
					?>
					<tr>
                     <td><?php  echo $row['fname']; ?></td>
                     <td><?php echo $row['fdesc']; ?></td>
                     <td><?php echo $row['fdatein']; ?></td>
                     <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                      <td><?php echo $row['class_name']; ?></td>
					</tr>
					<?php } ?>          
                  </tbody>
                </table>
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 <?php include('footer1.php'); ?>
</div>
</body>
</html>
