<?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body >
 <?php include('navbar_student.php'); ?>
 <?php include('link.php'); ?>
<main class="container">
	 <?php
		$query_announcement = mysqli_query($conn,"select * from teacher_class_announcements
												LEFT JOIN teacher ON teacher.teacher_id = teacher_class_announcements.teacher_id
												where  teacher_class_id = '$get_id' order by date DESC
												")or die(mysqli_error());
								$count = mysqli_num_rows($query_announcement);
								if ($count == '0'){?>	
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
								   No announcement posted yet.
								  </div>
								</div>
								<?php }else{ ?>
							
								  <div class="my-3 p-3 rounded card shadow-lg bg-dark mb-3 " style="font-size:25px;height:480px;overflow-y:scroll;">	
								
								<form action="read.php" method="post">
								<?php
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['teacher_class_announcements_id'];
								 ?> 
							  <div class="d-flex  pt-3" id="del<?php echo $id; ?>">
								 <img src="../admin/<?php echo $row['location']; ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle" width="60" height="60">

								  <div class="pb-3 mb-0 small lh-sm border-bottom w-100 ">
									<div class="d-flex justify-content-between">
									  <h5><?php echo $row['firstname']." ".$row['lastname'];  ?></h5>
										<small class="text-muted"style="font-size:18px;"><?php echo date('M jS Y \a\t D g:ia', strtotime($row["date"])); ?><span class="badge bg-info text-dark"><i class="far fa-clock"></i><time class ="timeago" datetime="<?php echo $row['date']; ?>"></time></span></small>
									</div>
									<div class="col-11 mb-1"> <?php echo $row['content']; ?></div>
								  </div>
								</div>	 
							<?php } ?>			
                 </form></div>
				 <?php } ?>
    
				
</main>
</body>
<script src="switch.js"></script>
     <script src="offcanvas.js"></script>
	 <?php include('timeago.php'); ?>
</html>