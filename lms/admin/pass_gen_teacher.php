<?php
	require_once 'dbcon.php';
	function randPass($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		}
		
	$query=mysqli_query($conn, "SELECT * FROM `teacher` where pass_stat='N/A'") or die(mysqli_error());
	while($row = mysqli_fetch_array($query)){
		$id = $row['teacher_id'];				
		$pass = randPass(12, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');	
		$hash = md5($pass);
		mysqli_query($conn, "UPDATE `teacher` SET `password` = '$pass', `default_password` = '$hash' , `pass_stat` = 'Default' WHERE `teacher_id` = '$id'") or die(mysql_error());
		}	
	header("location:teachers.php");
?>