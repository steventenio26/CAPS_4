 <?php
 include('../admin/dbcon.php');
 include('../session.php');
 $new_password  = md5($_POST['new_password']);
 
 mysqli_query($conn,"update student set password = '$new_password', default_password = '$new_password', pass_stat = 'Updated' where student_id = '$session_id'")or die(mysqli_error());
 ?>