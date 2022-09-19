<?php include('header_dashboard.php'); ?>
<?php  include('session.php'); ?>
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
		 <div class="col-5">
		        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
			  <?php
								$query = mysqli_query($conn,"select * from users where user_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>	
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Current Password</label>
                    <div class="col-sm-8">
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">New Password</label>
                    <div class="col-sm-8">
                      <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Password">
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                      <input type="password" id="retype_password" name="retype_password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="dashboard1.php" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info float-right">Save</button>
                </div>
                <!-- /.card-footer -->
              </form>
			  <script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Password does not match with your current password  ", { header: 'Change Password Failed' });
						}else if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'Change Password Failed' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Your password is successfully change", { header: 'Change Password Success' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dasboard1.php'  }, delay);  
						
						}
						
						
					});
			
					}
				});
			});
			</script>
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
