    <?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
	<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	?>
		<script>
		window.location = "assignment_student.php<?php echo '?id='.$get_id; ?>";
		</script>
	<?php
	  }	
	?>
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
   	<button type="button" class="btn btn-success mb-2 mt-2" data-bs-toggle="modal" data-bs-target="#submit_assignment_Modal"> Add file </button>
		<?php include('submit_assignment_modal.php'); ?>
            <div class="card shadow-lg">
				<div class="card-header">
                <h3 class="card-title">QUIZ</h3>
				<div class="card-body table-responsive p-0">
						<?php
							$query1 = mysqli_query($conn,"select * FROM assignment where assignment_id = '$post_id'")or die(mysqli_error());
							$row1 = mysqli_fetch_array($query1);
						?>
				<div class="alert alert-info">Submit Assignment in : <?php echo $row1['fname']; ?></div>					
                <table class="table table-hover text-nowrap">
                 <thead>
					<tr>
						<th>Date Upload</th>
						<th>File Name</th>
						<th>Description</th>
						<th>Submitted by:</th>
						<th>Grade</th>
					</tr>
				</thead>
						<tbody>
						<?php
							$query = mysqli_query($conn,"select * FROM student_assignment 
							LEFT JOIN student on student.student_id  = student_assignment.student_id
							where assignment_id = '$post_id'  order by assignment_fdatein DESC")or die(mysqli_error());
							while($row = mysqli_fetch_array($query)){
							$id  = $row['student_assignment_id'];
							$student_id = $row['student_id'];
						?>                              
					<tr>
						<td><?php echo date('M jS Y \a\t D g:ia', strtotime($row["assignment_fdatein"])); ?></td>
                        <td><?php  echo $row['fname']; ?></td>
                        <td><?php echo $row['fdesc']; ?></td>                                                                        
                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>   
						<?php if ($session_id == $student_id){ ?>
                        <td>
						<strong><p class="text-success"><?php echo $row['grade']; ?></p></strong>
						</td>
						<?php }else{ ?>
						<td></td>
						<?php } ?>										 
                        </tr>
						<?php } ?>
						</tbody>
				</table>
              </div>
           </div>
</main>
</body>
 <script src="switch.js"></script>
     <script src="offcanvas.js"></script>
	 <?php include('timeago.php'); ?>
</html>


   
   

   
   
   
   
   
   