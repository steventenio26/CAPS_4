<?php include('header.php'); ?>
<html lang="en">
<body class="hold-transition login-page">
<div class="row">
	   <div class="col-md-6">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1">Login as <b>Admin</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form id="login_form" method="post">	  
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">     
          <!-- /.col -->
          <div class="col-4">
            <button name="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
		
			<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						const Toast = Swal.mixin({
									  toast: true,
									  position: 'top-end',
									  showConfirmButton: false,
									  timer: 3000,
									  timerProgressBar: true,
									  didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									  }
									})
									Toast.fire({
									  icon: 'success',
									  title: 'Hello Admin! Welcome to Angels of Peace Academy LMS'
									})
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
						else
						{
						const Toast = Swal.mixin({
									  toast: true,
									  position: 'top-end',
									  showConfirmButton: false,
									  timer: 3000,
									  timerProgressBar: true,
									  didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									  }
									})
									Toast.fire({
									  icon: 'error',
									  title: 'Invalid username or password'
									})
						}
						}
						
					});
					return false;
				});
			});
			</script>
    </div>
  </div>
</div>
</div></div>

</body>

</html>



