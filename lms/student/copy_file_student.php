<?php
include('dbcon.php');
include('../session.php');
if (isset($_POST['copy_file'])){
$id=$_POST['selector'];
$N = count($id);
	$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
	$school_year_query_row = mysqli_fetch_array($school_year_query);
	$school_year = $school_year_query_row['school_year'];				
	$query_session = mysqli_query($conn,"select * from teacher_class_student
										LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
										LEFT JOIN class ON class.class_id = teacher_class.class_id 
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
										where student_id = '$session_id' and school_year = '$school_year'")or die(mysqli_error());
	$row = mysqli_fetch_array($query_session);
	$cid = $row['teacher_class_id'];		
	for($i=0; $i < $N; $i++)
	{
	$query = mysqli_query($conn,"select * from student_backpack where upload_file_id = '$id[$i]' and student_id='$session_id'")or die(mysqli_error());
	$count = mysqli_num_rows($query);
	if ($count > 0){ 	
	}else{
	$result = mysqli_query($conn,"select * from files  where file_id = '$id[$i]' ")or die(mysqli_error());
	while($row = mysqli_fetch_array($result)){
	$fname = $row['fname'];
	$floc = $row['floc'];
	$fdesc = $row['fdesc'];
	$teacher_id = $row['teacher_id'];
	mysqli_query($conn,"insert into student_backpack (upload_file_id, floc,fdatein,fdesc,student_id,fname) value('$id[$i]','$floc',NOW(),'$fdesc','$session_id','$fname')")or die(mysqli_error());	
		}
	}	
}
?>
<script>
window.location = 'downloadable_student.php<?php echo '?id='.$cid; ?>'; 
</script>
<?php
}
?>