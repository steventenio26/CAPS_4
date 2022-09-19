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
        echo '<script type="text/javascript">';
        echo 'swal("Change Password Failed", "Empty Fields!", "error");';
        echo '</script>';
    }else{
        if ($npass != $rpass){
            echo '<script type="text/javascript">';
            echo 'swal("Change Password Failed", "Password does not match with your new password!", "error");';
            echo '</script>';        
        }else{
            if ($password != $cpass){
                // hashing the current password
                $cpass = md5($cpass);
            }
            // hashing the new password
            $npass = md5($npass);
            
            $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id' AND password = '$cpass'");
            if (mysqli_num_rows($query) > 0){
                mysqli_query($conn,"UPDATE teacher SET password = '$npass', default_password = '$npass', pass_stat = 'Updated' where teacher_id = '$session_id'");
                echo '<script type="text/javascript">';
                echo 'swal("Change Password Success", "Your password is successfully change!", "success");';
                echo '</script>'; 
            ?> 
                    
            <?php
            } else{
                echo '<script type="text/javascript">';
                echo 'swal("Change Password Failed", "Password does not match with your current password!", "error");';
                echo '</script>';
            }
        } 
    }     
}


if (isset($_POST['profile-save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $filename = basename($_FILES['profileImage']['name']);
    $dbname = 'uploads/'.$filename;
    $tname = $_FILES['profileImage']['tmp_name'];
    $upload_dir = '../admin/uploads/'.$filename;

    if (move_uploaded_file($tname,$upload_dir) && $firstname && $lastname && $username) {
        mysqli_query($conn,"UPDATE teacher SET location = '$dbname', firstname = '$firstname', lastname = '$lastname', username = '$username' WHERE teacher_id = '$session_id'");        
    }elseif ($firstname || $lastname || $username) {
        mysqli_query($conn,"UPDATE teacher SET firstname = '$firstname', lastname = '$lastname', username = '$username' WHERE teacher_id = '$session_id'");        
    }
    echo '<script type="text/javascript">';
    echo 'swal("Change Profile Success", "Your profile was successfully change!", "success");';
    echo '</script>';    
}
?>