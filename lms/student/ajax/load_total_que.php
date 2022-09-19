<?php 
include('../dbcon.php');
session_start();
$total_que=0;
$res1=mysqli_query($conn, "SELECT * FROM questions where quiz_id ='$_SESSION[quiz_category]'");
$total_que=mysqli_num_rows($res1);
echo $total_que;
?>