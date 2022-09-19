
 <?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
.card-1 {
    border: none;
    border-radius: 10px;
    width: 100%;
    background-color: #fff
}
/* width */
::-webkit-scrollbar {
  width: 2px;
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
 <?php include('link.php'); ?>
<main class="container">
  
			<?php
									$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error());
									$count = mysqli_num_rows($query);	
								if ($count == '0'){ ?>
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
								      No Downloadable file has been uploaded yet.
								   </div>
								</div>
								<?php
								}else{
								?>							
    <form action="copy_file_student.php" method="post"> 
	<a href="#" data-bs-toggle="modal" data-bs-target="#copyModal" class="btn btn-primary mt-2 ml-1" style="margin-left:10px;"><i class="fas fa-copy"></i> save file</a>			 	
 <?php include('copy_to_backpack_modal.php'); ?>  
 <div style="overflow-x: scroll; font-size:18px;">
    <table class="table table-borderless table-responsive card-1 p-4 mt-2" >
        <thead>
            <tr class="border-bottom">			
			<th >
			
			<span class="ml-2">Check All <input type="checkbox" name="selectAll" id="checkAll" class="form-check-input"  style=" height: 25px; width: 25px;"/>
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script></span>
				
			</th>
			<th><span class="ml-2">Title and File Description</span> </th>
			<th><span class="ml-2">Uploaded by</span> </th>
            <th><span class="ml-2">Date</span> </th>
            <th> <span class="ml-2"></span> </th> 
            </tr>
        </thead>
        <tbody>
		<?php
		$query = mysqli_query($conn,"select * FROM files LEFT JOIN teacher ON teacher.teacher_id = files.teacher_id where class_id = '$get_id' order by fdatein DESC ")or die(mysqli_error());
		while($row = mysqli_fetch_array($query)){
		$id  = $row['file_id'];
		?>
         <tr class="border-bottom">
			<td >
			<div class="p-2 d-flex flex-row align-items-center mb-2">
			<?php
			$query2 = mysqli_query($conn,"select * FROM student_backpack where upload_file_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
				$row2 = mysqli_num_rows($query2);
				if($row2 > 0){
				echo '<h6 class="text-success fw-bolder">Already saved&nbsp
						<i class="fas fa-check-circle"></i></h6>';
				}else{
				?>		
			<input id="" class="form-check-input" name="selector[]" type="checkbox" value="<?php echo $id; ?>"style=" height: 25px; width: 25px; margin-left:75px;">
			</div><?php } ?></td>
			<td><div class="p-2 d-flex flex-row align-items-center mb-2"><div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold"><?php  echo $row['fname']; ?></span> <small class="text-muted"><?php echo $row['fdesc']; ?></small> </div></div></td>
			<td><div class="p-2 d-flex flex-row align-items-center mb-2"> <img src="../admin/<?php echo $row['location']; ?>" width="40" class="rounded-circle"> <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold"><?php echo $row['uploaded_by']; ?></span> </div></div></td>
            <td><div class="p-2"> <span class="d-block font-weight-bold"><?php echo date('M jS Y \a\t D g:ia', strtotime($row["fdatein"])); ?></span><span class="badge bg-info text-dark"><i class="far fa-clock"></i><time class ="timeago" datetime="<?php echo $row['fdatein']; ?>"></time></span></div></td>
            <td><div class="p-2 icons"><a href="<?php echo $row['floc']; ?>"><i class="fas fa-download"></i></a></div></td>				
        </tr>
         <?php } ?>
        </tbody>
    </table>
	</div>
     </form>
	<?php } ?>	

</main>
</table>
</body>
     <script src="switch.js"></script>
	      <script src="offcanvas.js"></script>
	 <?php include('timeago.php'); ?>
</html>


   
   