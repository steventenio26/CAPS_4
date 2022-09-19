<?php
include "db_conn.php";
include "../session.php";

if(isset($_POST['read'])){
    $id=$_POST['selector'];
    $N = count($id);
    for($i=0; $i < $N; $i++){
        mysqli_query($conn,"INSERT INTO notification_read_teacher (teacher_id,student_read,notification_id) VALUES('$session_id','yes','$id[$i]')");                
    }
    header("Location: notification_teacher.php");
}

?>