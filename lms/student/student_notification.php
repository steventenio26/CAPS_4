 <?php include('bootstrapandjquery.php'); ?>
 <?php include('../session.php'); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation + Sidebar</title>

</head>
 <style>
@import url('https://fonts.googleapis.com/css2?family=Mouse+Memoirs&display=swap');
body{
font-family: 'Mouse Memoirs', sans-serif;
font-size:30px;
background-color:rgba(251, 189, 94);
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
<body class="hold-transition sidebar-collapse layout-top-nav layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 
 <?php include('navbar_student.php'); ?>
      		<?php include('sidebar_student_dashboard.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="bg-" style="background-color:rgba(219, 215, 210); font-size:25px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                             <li class="breadcrumb-item active" aria-current="page">Notification</li>
							 <?php include('breadcrumb.php'); ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
   <div class="container mt-2" style="height:510px;overflow-y:scroll;">

  	<button id="delete"  class="btn btn-info btn-lg mb-2" name="read"><i class="icon-check"></i>Mark as read</button>
							
													<div class="float-end">
							Check All <input type="checkbox"  name="selectAll" id="checkAll" >
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
    <div class="row d-flex" >
	<form action="read.php" method="post">
	<?php if($not_read == '0'){
								}else{ ?>
						
							
							<?php } ?>
						<?php $query = mysqli_query($conn,"select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 	
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year'  order by notification.date_of_notification DESC
					")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					if ($count  > 0){
					while($row = mysqli_fetch_array($query)){
					$get_id = $row['teacher_class_id'];
					$id = $row['notification_id'];
					
					
					$query_yes_read = mysqli_query($conn,"select * from notification_read where notification_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
					$read_row = mysqli_fetch_array($query_yes_read);
					
					$yes = $read_row['student_read'];
				
					?>
					   <?php if ($yes == 'yes'){ 
					   $css="col-md-12";
										}else{
										 $css="col-md-6";
										?>
										<input id="" class="float-right" name="selector[]" type="checkbox" value="<?php echo $id; ?>" checked>	
										<?php } ?>	
        <div class="<?php echo $css;?> " id="del<?php echo $id; ?>" >  
		
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="../admin/<?php echo $row['location']; ?>" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary"><?php echo $row['firstname']." ".$row['lastname'];  ?></small> <small class="font-weight-bold">
					 <?php echo $row['notification']; ?> In
					 <a href="<?php echo $row['link']; ?>
					 <?php echo '?id='.$get_id; ?>">
					 <?php echo $row['class_name']; ?>
					 <?php echo $row['subject_code']; ?> </a>
                    
					</small></span> </div> <small><time class ="timeago" datetime="<?php echo $row['date_of_notification']; ?>"></time></small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"> <small><?php echo $row['date_of_notification']; ?></small> </div>
                    <div class="icons align-items-center">
					 
					</div>
                </div>
            </div>
           
               
        </div>
		<?php
					} }else{
					?>
					 <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
                No notification yet.
                </div>
					<?php
					}
					?>
                 </form>
    </div>
</div> 
    </div>
    <!-- /.content -->
  </div>

</div>
 <?php include('timeago.php'); ?>
</body>
</html>
