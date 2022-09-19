<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
 <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>    
	    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="../../dist/img/logo.jpg" class="user-image img-circle elevation-2" alt="logo">
          <span class="d-none d-md-inline">Angels of Peace Academy</span>
        </a>
       
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

	   <li class="nav-item dropdown user-menu">
	   	 <?php $query= mysqli_query($conn,"select * from users where user_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="../../dist/img/admin_avatar.png" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $row['username'];  ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../../dist/img/admin_avatar.png" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo $row['firstname']." ".$row['lastname'];  ?> - System Administrator
              
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">My Profile</a>
            <a href="logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
	  <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
	  
    </ul>
	
  </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <a href="dashboard.php" class="brand-link">
      <img src="../../dist/img/admin_avatar.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administrator Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
		  <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="dashboard.php")?"active":""?>"href="dashboard.php">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
           
          </li>
		  
          <li class="nav-item">
		  <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="subjects.php")?"active":""?>"href="subjects.php">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Subjects 
              </p>
            </a>           
          </li>
          
          <li class="nav-item">
           	<a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="edit_class.php")?"active":""?>"href="class.php">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Class          
              </p>
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="admin_user.php")?"active":""?>"href="admin_user.php">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Admin Users          
              </p>
            </a>           
          </li>
           <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="department.php")?"active":""?>"href="department.php">
              <i class="nav-icon fas fa-building"></i>
              <p>
               Departments       
              </p>
            </a>           
          </li>
		   <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="students.php")?"active":""?>"href="students.php">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Students          
              </p>
            </a>           
          </li>
		   <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="teachers.php")?"active":""?>"href="teachers.php">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
               Teachers         
              </p>
            </a>           
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="assign_teacher.php")?"active":""?>"href="assign_teacher.php">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
               Assign Teachers         
              </p>
            </a>           
          </li>
		   <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="downloadable.php")?"active":""?>"href="downloadable.php">
              <i class="nav-icon fas fa-download"></i>
              <p>
               Downloadable Materials         
              </p>
            </a>           
          </li>
		   <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="assignment.php")?"active":""?>"href="assignment.php">
              <i class="nav-icon fas fa-upload"></i>
              <p>
               Uploaded Assignments          
              </p>
            </a>           
          </li>
		   <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="content.php")?"active":""?>"href="content.php">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Content        
              </p>
            </a>           
          </li>
		   <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="user_log.php")?"active":""?>"href="user_log.php">
              <i class="nav-icon fas fa-history"></i>
              <p>
                User Log          
              </p>
            </a>           
          </li>
		   <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="activity_log.php")?"active":""?>"href="activity_log.php">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Activity Log         
              </p>
            </a>           
          </li>
		   <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="school_year.php")?"active":""?>"href="school_year.php">
              <i class="nav-icon fas fa-school"></i>
              <p>
              School Year         
              </p>
            </a>           
          </li>
		   <li class="nav-item">
             <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=="calendar_of_events.php")?"active":""?>"href="calendar_of_events.php">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Calendar Events         
              </p>
            </a>           
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>