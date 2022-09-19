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
	<div class="row mt-2">
        <div class="col-md-12">
            <div class="card shadow-lg">
				<div class="card-header">
				<h5 class="card-title text-dark"> Grade Progress</h5>
				</div>
				<div class="card-body">
                <div class="row">
					<div class="col-md-6">   
						<div class="card">
						<div class="card-header">
						<h3 class="card-title text-dark">Assignment</h3>
						</div> 
						<?php
										$query = mysqli_query($conn,"select * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										RIGHT JOIN assignment on student_assignment.assignment_id  = assignment.assignment_id
										WHERE student_assignment.student_id = '$session_id'
										order by fdatein DESC")or die(mysqli_error());
										$count = mysqli_num_rows($query);
										if ($count > 0){
										?>		
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
									<th>Date Upload</th>
									<th>Assignment</th>
									<th>Grade</th>
									</tr>				
								</thead>
									<tbody>		
                              		
									<?php
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_assignment_id'];
										$student_id = $row['student_id'];
										$grade = $row['grade'];
										
									?>                              
									<tr>
									<td><?php echo date('M jS Y \a\t D g:ia', strtotime($row["assignment_fdatein"])); ?></td>
                                    <td><?php  echo $row['fname']; ?></td>
									<?php if ($session_id == $student_id){ ?>
                                    <td>
									<?php if ($grade !==  '' AND $session_id == $student_id){ ?>
									<div class="text-success fw-bold"><?php echo $row['grade']; ?></div></td>
										<?php }else if($grade ==  '' AND $session_id == $student_id){ ?>
									
									<div class="text-danger fw-bold">not graded</div>
										<?php } ?>	
									<?php }else{ ?>
									<td></td>
									<?php } ?>
														
									</tr>
									<?php } ?>						  
									</tbody>
							</table>
						</div>
							  <?php }else{ ?>
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
								    No assignment has been submitted yet. Go to <a href="assignment_student.php<?php echo '?id='.$get_id; ?>" class="alert-link">MY ASSIGNMENT</a> to submit assignment.
								   </div>
								</div>
								<?php } ?>
					</div>                
                </div>  
                <div class="col-md-6">		
				<div class="card">
				<div class="card-header">
                <h3 class="card-title text-dark">QUIZ</h3>
				</div>
				<?php
										$query = mysqli_query($conn,"select * FROM class_quiz 
										LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
										where teacher_class_id = '$get_id' order by class_quiz_id DESC ")or die(mysqli_error());
										$count = mysqli_num_rows($query);
										if ($count > 0){
										?>
					<div class="card-body table-responsive p-0">
						<table class="table table-hover text-nowrap">
							<thead>
								<tr>
								<th>Quiz Title</th>
								<th>Description</th>
								<th>Quiz Time (In Minutes)</th>
								<th></th>
								</tr>
							</thead>
							<tbody>
                              	 <?php
						$i=1;
						$res=mysqli_query($conn, "select * FROM class_quiz LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id where teacher_class_id = '$get_id'");
						while($row=mysqli_fetch_array($res)){
						$quiz_id = $row['quiz_id'];
						$query = mysqli_query($conn,"select * from quiz_results where quiz_id = '$quiz_id' and student_id = '$session_id'")or die(mysqli_error());
						$count = mysqli_num_rows($query);				
						$init = $row['quiz_time'];;
						$hours = floor($init / 3600);
						$minutes = floor(($init / 60) % 60);
						?>
                        <tr class="border-bottom">
                            <td ><strong><?php echo $row['quiz_title']; ?></strong></td>
                            <td><?php  echo $row['quiz_description']; ?></td>
                            <td><?php echo "$hours hr and $minutes mins"; ?></td>
							<td>
							<center>
							<?php if ($count < 1){?> 
							<h6 class="text-danger fw-bolder">not yet taken
							<i class="fa fa-tasks"></i></h6>
							</center><?php }else{ ?><center>
							<?php
							$res1=mysqli_query($conn, "select * from quiz_results where quiz_id = '$quiz_id' and student_id = '$session_id'");
							while($row1=mysqli_fetch_array($res1))
							{
							?>
							<h5 class="text-success fw-bolder"><span class="badge bg-success">score:&nbsp<?php echo $row1['correct_answer']; ?>
							
							/&nbsp<?php echo $row1['total_question']; ?>
							</span></h5>
							
							<a href="quiz_result.php<?php echo '?id='.$quiz_id; ?>&<?php echo '?session_id='.$session_id; ?>" class="btn btn-primary ">view result</a> 
							</center>
							
							<?php } ?>
							<?php } ?>
							
							</td>
						</tr>
						<?php
						}
						?>									
									</tbody>
								</table>
							  </div>
							  <?php }else{ ?>
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
								     No quiz has been taken yet. Go to <a href="student_quiz_list.php<?php echo '?id='.$get_id; ?>" class="alert-link">MY QUIZ</a> to take your quiz.								   </div>
								</div>
								<?php } ?>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
</main>
</body>
     <script src="offcanvas.js"></script>
<script src="switch.js"></script>
	 <?php include('timeago.php'); ?>
</html>


   
   

   
   


   
   