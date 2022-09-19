
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
	   <div class="col-md-6">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
               Add content
              </h3>
            </div>         
			 <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Title</label>
                    <input name="title" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Content</label>
                     <textarea name="content" id="summernote">              
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
										$title = $_POST['title'];
										$content = $_POST['content'];
										mysqli_query($conn,"insert into content (title,content) value('$title','$content')")or die(mysqli_error());
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
			  <form action="delete_content.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete content
                </button>
				<?php include('modal_delete_content.php'); ?>
				 
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
