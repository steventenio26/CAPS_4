<?php 
include('../dbcon.php');
session_start();
$total_que=0;
$res1=mysqli_query($conn, "SELECT * FROM exam_questions where exam_id ='$_SESSION[exam_category]'");
$total_que=mysqli_num_rows($res1);
echo $total_que;
?>