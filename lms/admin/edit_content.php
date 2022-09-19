
  <?php include('header.php'); ?>
   <?php include('session.php'); ?>
	<?php $get_id = $_GET['id']; ?>
		
<html lang="en">
<head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include('contents_sidebar.php'); ?>
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
	   <div class="col-md-6">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
               Add content
              </h3>
            </div>         
			 <form method="post">
                <div class="card-body">
				   <?php
									   $query = mysqli_query($conn,"select * from content where content_id = '$get_id'")or die(mysqli_error());
									   $row = mysqli_fetch_array($query);
									   ?>
                  <div class="form-group">
                    <label>Title</label>
                    <input name="title"  value="<?php echo $row['title']; ?>" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                     <textarea name="content" id="summernote">
							<?php echo $row['content']; ?>
              </textarea>
                  </div>
				  
               </div>
                <!-- /.card-body -->
                <div class="card-footer">
				<a href="content.php" class="btn btn-warning mr-2">Cancel</a>
                  <button name="update" class="btn btn-primary">Save</button>
                </div>
              </form>
			  
										<?php
										if (isset($_POST['update'])){
										$title = $_POST['title'];
										$content = $_POST['content'];
										mysqli_query($conn,"update content set title = '$title' , content = '$content' where content_id = '$get_id'")or die(mysqli_error());
										?>
										<script>
										window.location = 'content.php';
										</script>
										<?php
										}
										?>
          </div>
        </div>
          <div class="col-6">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Content</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="delete_subject.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete content
                </button>
				<?php include('modal_delete.php'); ?>
				 
                  <thead>
                  <tr>
                                   <th></th>
												 <th>Title</th>
												 <th>Edit</th>
                                   
                                </tr>
                  </thead>
                  <tbody>
               <?php
					$content_query = mysqli_query($conn,"select * from content")or die(mysqli_error());
					while($row = mysqli_fetch_array($content_query)){
					$id = $row['content_id'];
					?>
                              
										<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                         <td><?php echo $row['title']; ?></td>
                                         <td width="30"><a href="edit_content.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
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
