<?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="offcanvas.css" rel="stylesheet">
</head>
  <style>
/*Profile card 2*/
.profile-card-2 .card-img-block{
    float:left;
    width:100%;
    height:150px;
    overflow:hidden;
	
}
.profile-card-2 .card-body{
    position:relative;
}
.profile-card-2 .profile {
  border-radius: 50%;
  position: absolute;
  top: -42px;
  left: 15%;
  max-width: 75px;
  border: 3px solid rgba(255, 255, 255, 1);
  -webkit-transform: translate(-50%, 0%);
  transform: translate(-50%, 0%);
}
.profile-card-2 h5{
    font-weight:600;
    font-size:25px;
}
.profile-card-2 .card-text{
    font-weight:300;
    font-size:25px;
}
.profile-card-2 .icon-block{
    float:left;
    width:100%;
}
.profile-card-2 .icon-block a{
    text-decoration:none;
}
.profile-card-2 i {
  display: inline-block;
    font-size: 16px;
    color: #6ab04c;
    text-align: center;
    border: 1px solid #6ab04c;
    width: 35px;
    height: 35px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.profile-card-2 i:hover {
  background-color:#6ab04c;
  color:#fff;
}
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
<body >
<?php include('navbar_student.php'); ?>
<?php include('sidebar_student_notification.php'); ?>
<main class="container">
 <?php include('breadcrumb.php'); ?>
	
	
   <?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
	?>
<?php include('count.php'); ?>
	<?php $query = mysqli_query($conn,"select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														")or die(mysqli_error());
														$count = mysqli_num_rows($query);
	?>	
  <div class="row">    	
 <?php
														if ($count != '0'){
														while($row = mysqli_fetch_array($query)){
														$id = $row['teacher_class_id'];	
													?>      	
			<div class="col-md-4 mt-3">
    		    <div class="card profile-card-2 shadow-lg bg-dark mb-3" style="border-radius:10px;">
                    <div class="card-img-block">
                        <img class="img-fluid" src="../../dist/img/class.jpg" alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="../admin/<?php echo $row['location']; ?>"  alt="profile-image" class="profile"/>
                        <h5><strong><?php echo $row['firstname']." ".$row['lastname']?></strong></h5>
                        <h4>Subject Title:<strong><?php echo $row['subject_title']; ?></strong></h4>
						<div class="d-flex justify-content-between mt-3">
						    <p style="font-size:20px;">Class Name: <strong><?php echo $row['class_name']; ?></strong></p>
							<p style="font-size:20px;">Subject Code: <strong><?php echo $row['subject_code']; ?></strong></p>
						</div>
                         <a href="my_classmates.php<?php echo '?id='.$id; ?>" class="btn btn-lg btn-primary float-start">Go to class </a>   
					</div>
                </div>   
  		</div>
			 <?php }}else{ ?>
		</div>	
			<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
								  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
								  </symbol>
								  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
									<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
								  </symbol>
								  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
									<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
								  </symbol>
								</svg>	
								<div class="alert alert-primary d-flex align-items-center mt-2" role="alert">
								  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
								  <div>
								  You're currently not enroll in yout class.
								  </div>
								</div>
	
			<?php } ?>	
			
</main>
</body>
<script src="switch.js"></script>
<script src="offcanvas.js"></script>
</html>

 