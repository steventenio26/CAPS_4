<?php
include "db_conn.php";
include "../session.php";

$query_yes = mysqli_query($conn,"SELECT * from teacher_notification
					LEFT JOIN notification_read_teacher on teacher_notification.teacher_notification_id =  notification_read_teacher.notification_id where teacher_id = '$session_id'");
$count_no = mysqli_num_rows($query_yes);
$query = mysqli_query($conn,"SELECT * from teacher_notification
					LEFT JOIN teacher_class on teacher_class.teacher_class_id = teacher_notification.teacher_class_id
					LEFT JOIN student on student.student_id = teacher_notification.student_id
					LEFT JOIN assignment on assignment.assignment_id = teacher_notification.assignment_id 
					LEFT JOIN class on teacher_class.class_id = class.class_id
					LEFT JOIN subject on teacher_class.subject_id = subject.subject_id
					where teacher_class.teacher_id = '$session_id' 
					");
$count = mysqli_num_rows($query);
$not_read = $count -  $count_no;

if($not_read == "0"){

}else{
    echo $not_read;
}
?>