
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
		 <div class="col-6">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Subject Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="">
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
					 <textarea name="description" id="summernote">              
              </textarea>
                       
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
			  <?php
										if (isset($_POST['save'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$description = $_POST['description'];
										$semester = $_POST['semester'];
										
										
										$query = mysqli_query($conn,"select * from subject where subject_code = '$subject_code' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										$.notify("Data Already Exist!", "error");
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into subject (subject_code,subject_title,description,semester) values('$subject_code','$title','$description','$semester')")or die(mysqli_error());
										
										
										mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add Subject $subject_code')")or die(mysqli_error());
										
										
										?>
										<script>
										$.notify("Subject added successfully!", "success");
								
										</script>
										
										<?php
										}
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
