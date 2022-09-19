<?php
if (isset($_POST['change'])) {
    // current password
    $cpass = $_POST['cpass'];
    // new password
    $npass = $_POST['npass'];
    // repassword
    $rpass = $_POST['rpass'];
    // password from database
    $password = $_POST['password'];
    if ($cpass == "" || $npass == "" || $rpass == ""){
				echo "<script type='text/javascript'>";
                echo "Swal.fire(";
                echo "'Empty Fields!',";
                echo "'Change Password Failed',";  
                echo "'error');";   
                echo "</script>";
    }else{
        if ($npass != $rpass){
				echo "<script type='text/javascript'>";
				echo "Swal.fire(";
                echo "'Change Password Failed',";
                echo "'Password does not match with your new password!',";  
                echo "'error');";   
                echo "</script>";    
        }else{
            if ($password != $cpass){
                // hashing the current password
                $cpass = md5($cpass);
            }
            // hashing the new password
            $npass = md5($npass);
           $query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id' AND password = '$cpass'");
            if (mysqli_num_rows($query) > 0){
                mysqli_query($conn,"UPDATE student SET password = '$npass', default_password = '$npass', pass_stat = 'Updated' where student_id = '$session_id'");
             
				
				echo "<script type='text/javascript'>";
                echo "Swal.fire(";
                echo "'Change Password Success',";
                echo "'Your password is successfully change!',";  
                echo "'success');";   
                echo "</script>";
            } else{
                 echo "<script type='text/javascript'>";
                echo "Swal.fire(";
                echo "'Change Password Failed',";
                echo "'y!',";  
                echo "'error');";   
                echo "</script>";
            }
        } 
    }     
}
?>