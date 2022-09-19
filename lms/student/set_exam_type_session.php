
<?php
include('dbcon.php');
session_start();
$exam_category = $_GET["exam_category"];
$_SESSION["exam_category"] = $exam_category;
$res=mysqli_query($conn, "select * FROM class_exam LEFT JOIN exam on class_exam.exam_id = exam.exam_id where exam.exam_id='$exam_category'");
while($rowe=mysqli_fetch_array($res))
{
    $_SESSION["exam_time"]=$rowe["exam_time"]/60;
}
$date= date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>