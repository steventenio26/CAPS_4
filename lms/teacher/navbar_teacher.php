<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-5 col-md-2" href="#">Angel of Peace Academy</a>
      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

<?php 
include "navbar_action.php";
$sql = "SELECT * FROM teacher WHERE teacher_id = '$session_id'";
$query1= mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query1);
$fullname = ucwords($row['firstname'].' '.$row['lastname']);
$picture = $row['location'];
$query = mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id = '$session_id'");
$row1 = mysqli_fetch_array($query);

// department query
    $dep_query = mysqli_query($conn, "SELECT * FROM department WHERE teacher_id = '$session_id'");
    $dep_row = mysqli_fetch_array($dep_query);
    $dep_id = $dep_row['department_id'];
    $dep_count = mysqli_num_rows($dep_query);
?>

      <!-- <div class="collapse navbar-collapse" id="navbarsExampleDefault"> -->
        <ul class="navbar-nav flex-row navbar-no-expand ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-item nav-link text-light mr-5" href="#" id="dropdown01" aria-expanded="false" data-toggle="dropdown">
              <?php echo $fullname; ?>
              <span data-feather="settings"></span></a>
            <div class="dropdown-menu bg-light dropdown-menu-right mr-2 mt-1" aria-labelledby="dropdown01">              
              <a class="dropdown-item" data-toggle="modal" data-target="#change" href="#"><span data-feather="key"></span>  Change Password</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#profile" href="#"><span data-feather="user"></span>  
              Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../login/logout.php"><span data-feather="log-out"></span> Logout</a>
            </div>
          </li>          
        </ul>
    <!-- </div> -->    
    </nav>
    <?php include "navbar_modal.php"; ?>