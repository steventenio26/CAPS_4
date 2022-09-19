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

  <div class="my-3 p-3 rounded card shadow-lg bg-dark mb-3 " style="font-size:23px;">
   
	 <?php										
														$my_student = mysqli_query($conn,"SELECT *
														FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
														
														while($row = mysqli_fetch_array($my_student)){
														$id = $row['teacher_class_student_id'];
														?>	
      <div class="d-flex pt-3  ">
      <img src="../admin/<?php echo $row['location']; ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle" width="50" height="50">

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <h5 class="mt-2"><?php echo $row['firstname']." ".$row['lastname']?></h5>
          
        </div>
       
      </div>
    </div>
  <?php } ?>
  </div>
      	
  
</main>

</body>
  <script src="switch.js"></script>
    
     <script src="offcanvas.js"></script>
</html>
