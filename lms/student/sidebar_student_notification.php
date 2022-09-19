<?php include('count.php'); ?>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header"style="background-color:rgba(251, 189, 94);">
    <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel" style="font-size:23px;"><img src="../../dist/img/notif.png" class=" z-depth-2" width="50" height="50">Notifications</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body bg-dark" style="font-size:20px;">
<form action="read.php" method="post">
  <?php if($not_read == '0'){							}else{ ?>	
					<?php } ?>
					<?php $query = mysqli_query($conn,"select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 	
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year' order by notification.date_of_notification DESC
					")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					if ($count  > 0){
					while($row = mysqli_fetch_array($query)){
					$get_teacher_id = $row['teacher_class_id'];
					$notif_id = $row['notification_id'];
					$query_yes_read = mysqli_query($conn,"select * from notification_read where notification_id = '$notif_id' and student_id = '$session_id'")or die(mysqli_error());
					$read_row = mysqli_fetch_array($query_yes_read);
					$yes = $read_row['student_read'];
					if ($yes == 'yes'){ 
					    $css="";
						$status="fa-check";
						$bg="";
					}else{
						$status="fa-bell";
						$css="fw-bold";
						$bg="#f2f5f7";
					?>
					<input id="" class="float-right" name="selector[]" type="checkbox" value="<?php echo $notif_id; ?>" checked hidden>	
					<?php } ?>	
				  <div class="d-flex pt-3 mt-2 shadow bg-dark" style="background-color:<?php echo $bg;?>; border-radius:12px;" id="del<?php echo $notif_id; ?>">
					 <img src="../admin/<?php echo $row['location']; ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle" width="45" height="45"  style="margin-left:5px;">
					  <div class="pb-3 mb-0 small lh-sm w-100">
						<div class="d-flex justify-content-between">
						  <h5 class="<?php echo $css;?>" style="font-size:16px;"><?php echo $row['firstname']." ".$row['lastname'];  ?></h5>
							<small class=" <?php echo $css;?> position-relative" style="font-size:13px;"><time class ="timeago" datetime="<?php echo $row['date_of_notification']; ?>"></time>
						</small>
						</div>
						<div class="col-11 mb-2 small <?php echo $css;?>"style="font-size:16px;"><?php echo $row['notification']; ?> In
							<a href="<?php echo $row['link']; ?>
							<?php echo '?id='.$get_teacher_id; ?>" style="text-decoration:none;">
							<?php echo $row['class_name']; ?>
							<?php echo $row['subject_code']; ?> </a>
						</div>
							<small class=" <?php echo $css;?> position-relative" style="font-size:13px;"><?php echo date('M jS Y \a\t D g:ia', strtotime($row["date_of_notification"])); ?>&nbsp
							<i class='fa <?php echo $status;?>' ></i>
							</small>
					  </div>
						<i class='delete_notif fa fa-trash' data-id='<?php echo $row['notification_id']; ?>' style="cursor:pointer; color:tomato; margin-left:2px;"></i>
					</div>
					<?php
					} }else{
					?>
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
								  no new notification.
								  </div>
								</div>
					<?php
					}
					?></form>
					
  </div>
</div>
 <script src='delete_notification.js' type='text/javascript'>
 </script>
   <script src="../../dist/js/jquery-3.6.0.min.js"></script> 
<?php include('timeago.php'); ?>


