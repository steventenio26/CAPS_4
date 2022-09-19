
  
  <?php 

   include('header.php'); ?>
    <?php  include('session.php'); ?>
    <?php include('sweetalert.php'); 
	?>
<html lang="en">

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbarmain.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
          <?php
                if(isset($_SESSION['message']))
                {
                  echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Alert!</h5>"
                  .$_SESSION['message']." </div>";
                    unset($_SESSION['message']);
                }else if(isset($_SESSION['message1']))
                {
                  echo "<div class='alert alert-warning alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Alert!</h5>"
                  .$_SESSION['message1']." </div>";
                unset($_SESSION['message1']);
                }else if(isset($_SESSION['message2']))
                {
                  echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Alert!</h5>"
                  .$_SESSION['message2']." </div>";
                  unset($_SESSION['message2']);
                  }
                ?>
				<div class="table" id="studentTableDiv1">
				<?php include('student_table.php'); ?>
                </div>                  
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include('footer.php'); ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

</body>
</html>
