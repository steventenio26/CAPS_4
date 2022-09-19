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
$not_read = $count -  $count_no;?>
<form action="read_teacher.php" method="POST">
<?php
if($not_read == '0'){
}else{ ?>
    <div class="btn-toolbar mb-3 mr-4">
                <button name="read" class="btn btn-sm btn-outline-info"><span data-feather="check"></span>
                Mark all as read</button>
            </div>
<?php } ?>
 
<?php
$sql = "SELECT * FROM teacher_notification
LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_notification.teacher_class_id
LEFT JOIN student ON student.student_id = teacher_notification.student_id
LEFT JOIN assignment ON assignment.assignment_id = teacher_notification.assignment_id 
LEFT JOIN class ON teacher_class.class_id = class.class_id
LEFT JOIN subject ON teacher_class.subject_id = subject.subject_id
WHERE teacher_class.teacher_id = '$session_id'  ORDER BY  teacher_notification.date_of_notification DESC
";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_array($result)){
    $assignment_id = $row['assignment_id'];
    $get_id = $row['teacher_class_id'];
    $id = $row['teacher_notification_id'];
    $class_id = $row['class_id'];
    
    $query_yes_read = mysqli_query($conn,"SELECT * FROM notification_read_teacher WHERE notification_id = '$id' AND teacher_id = '$session_id'");
    $read_row = mysqli_fetch_array($query_yes_read);
    $yes = $read_row['student_read']; 

if($yes === "yes"){
    $css="text-dark bg-light";
}else{
    $css="text-white bg-dark";?>
    <input id="" name="selector[]" type="checkbox" value="<?php echo $id; ?>" checked hidden>
    <?php    
} ?>
        <div class="card mb-3 <?php echo $css;?>">
            <div class="card-body">
                <strong><?php echo $row['firstname']." ".$row['lastname'];  ?></strong>
                <?php echo $row['notification']; ?> In <b><?php echo $row['fname']; ?></b>
                <a class="text-info" href="<?php echo $row['link']; ?><?php echo '?id='.$get_id; ?>&<?php echo 'assid='.$assignment_id.'&cid='.$class_id; ?>">    
                    <?php echo $row['class_name']; ?> 
                    <?php echo $row['subject_code'];?>
                </a>
            </div>
        </div>            

<?php } }else{ ?>
    <div class="col-12 alert alert-danger">
        <h6 class="text-dark text-center"><span data-feather="alert-triangle"></span> No currently announcement</h6>
    </div>
<?php }
?>
</form>