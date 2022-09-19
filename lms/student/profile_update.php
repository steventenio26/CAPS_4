<?php
	include '../session.php';


	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];	
		$password = $_POST['password'];	
		$photo = $_FILES['photo']['name'];
		if($curr_password, $row['password']){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../admin/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $row['photo'];
			}

			if($password == $row['password']){
				$password =  $row['password'];
			}
			else{
				$password = ($password);
			}

			  $up_query = "UPDATE student SET  password = '$password', photo = '$filename' WHERE student_id = '".$row['student_id']."'";
              $up_result = mysqli_query($conn, $up_query);
              $_SESSION['success'] = 'Admin profile updated successfully';
			
			}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}
	header('location:my_profile1.php');

?>