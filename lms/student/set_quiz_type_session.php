
<?php
include('dbcon.php');
session_start();
$quiz_category = $_GET["quiz_category"];
$_SESSION["quiz_category"] = $quiz_category;
$res=mysqli_query($conn, "select * FROM class_quiz LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id where quiz.quiz_id='$quiz_category'");
while($rowe=mysqli_fetch_array($res))
{
    $_SESSION["quiz_time"]=$rowe["quiz_time"]/60;
}
$date= date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+$_SESSION[quiz_time] minutes"));
$_SESSION["quiz_start"]="yes";
?>