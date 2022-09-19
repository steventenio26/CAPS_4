
  <?php include('header.php'); ?>
    <?php  include('session.php'); ?>
	<?php $get_id = $_GET['id']; ?>
		
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
		 <div class="col-6">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
			  <?php
									$query = mysqli_query($conn,"select * from subject where subject_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									
                <div class="card-body">
                  <div class="form-group">
                    <label>Subject Code</label>
                    <input value="<?php echo $row['subject_code']; ?>" name="subject_code" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Subject Title</label>
                    <input value="<?php echo $row['subject_title']; ?>" name="title" class="form-control"  placeholder="">
                  </div>
				  <div class="row">
				   <div class="col-sm-6">
                  <div class="form-group">
                     <label>Grading</label>
                        <select name="semester" class="form-control">
                          <option></option>
						  <option>1st</option>
						  <option>2nd</option>
              <option>3rd</option>
              <option>4th</option>
                        </select>
                  </div></div></div> <div class="form-group">
                    <label>Description</label>
					 <textarea name="description" id="summernote"> <?php echo $row['description']; ?>             
              </textarea>
                       
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				 <a href="subjects.php" class="btn btn-warning">Cancel</a>
                  <button name="update" class="btn btn-primary">Update</button>
                </div>
              </form>
			 <?php
										if (isset($_POST['update'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$description = $_POST['description'];
										
										
									
										mysqli_query($conn,"update subject set subject_code = '$subject_code' ,
																		subject_title = '$title',															
																		description = '$description'
																		where subject_id = '$get_id' ")or die(mysqli_error());
																		
										mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit Subject $subject_code')")or die(mysqli_error());
										
										?>
										<script>
										window.location = "subjects.php";
										</script>
										<?php
										}
										
										
										?>
            </div>
		 </div>
          <div class="col-6">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subjects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_subject.php" method="post">
                <table id="example1" class="table table-bordered table-striped">		
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete Subject
                </button>
				<?php include('modal_delete.php'); ?>
				 
                  <thead>
                  <tr>
                    <th>Select to Delete</th>
                    <th>Subject Code</th>
                    <th>Subject Title</th>
                    <th>Edit</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
                <tr>
				  				  <?php
					$subject_query = mysqli_query($conn,"select * from subject")or die(mysqli_error());
					while($row = mysqli_fetch_array($subject_query)){
					$id = $row['subject_id'];
					?>
                  <td width="20">
					<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['subject_code']; ?></td>
					<td><?php echo $row['subject_title']; ?></td>
							<td width="30"><a href="edit_subject.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a></td>
					
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
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
