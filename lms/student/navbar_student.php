  <?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);								
							?>
						
<nav class="navbar navbar-expand-lg fixed-top navbar-dark border-bottom" aria-label="Main navigation" style="font-size:25px;  background-color:rgb(33, 37, 41);">
  <div class="container ">
  
    <a class="navbar-brand" href="dashboard_student.php" style="font-size:23px;">
	 <img src="../../dist/img/logo.jpg" class="rounded-circle z-depth-2" width="60" height="60">
     Angels of Peace Academy
	</a>
	 
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  

     <div class="navbar-collapse offcanvas-collapse " id="navbarsExampleDefault" style="font-size:20px;">
     
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
		
          <a class="nav-link active" href="dashboard_student.php"><img src="../../dist/img/teacher.png" class=" z-depth-2" width="45" height="45">Classes</a>
		  
        </li>
		
        <li class="nav-item">
        <a href="" class="nav-link active position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><img src="../../dist/img/notif.png" class=" z-depth-2" width="45" height="45">Notifications	
	
		</a>
        </li> <div id="count"></div>
        <li class="nav-item">
          <a class="nav-link active" href="message.php?sender_id="  type="button"><img src="../../dist/img/chat.png" class=" z-depth-2" width="45" height="45">Message</a>
        </li>
       <li class="nav-item">
          <a class="nav-link active " href="#" data-bs-toggle="modal" data-bs-target="#myModal"><img src="../../dist/img/folder.png" class=" z-depth-2" width="45" height="45"> Save Files
		  
		  </a>
        </li>
		<li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <img src="../admin/<?php echo $row['location']; ?>" class="rounded-circle z-depth-2" width="45" height="45">My Profile</a>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="my_profile.php"><i class="fas fa-user"></i>My Profile</a></li>
            <li><div class="dropdown-item"><div class="form-check form-switch " >Darkmode
         
          <input class="form-check-input" type="checkbox" id="lightSwitch" style="cursor:pointer;"/>
        </div></div></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../login/logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
 <script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("count").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "count_notif.php", true);
  xhttp.send();
}
setInterval(function(){
	loadXMLDoc();
	// 1sec
},1000);
window.onload = loadXMLDoc;
  

</script>
   <?php include('backpack.php'); ?>	
    <?php include('sidebar_student_notification.php'); ?>