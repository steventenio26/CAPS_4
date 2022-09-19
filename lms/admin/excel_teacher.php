<?php
session_start();
include('dbcon.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_teacher']))
{
    $allowed_ext = ['xls','csv','xlsx'];
    $fileName = $_FILES['import_file']['name'];
    $checking = explode(".", $fileName);
    $file_ext = end($checking);

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $row)
		
        {       											   										 	        
                $fn = $row['0'];
                $ln = $row['1'];
                $un = $row['2'];
				$department = $row['3'];
				$email = $row['4'];
                
				
                $checkteacher = "SELECT * from teacher where username = '$un' ";
                $checkteacherresult = mysqli_query($conn, $checkteacher);

				$query= mysqli_query($conn,"SELECT * from department where department_name = '$department' ")or die(mysqli_error());
				$row1 = mysqli_fetch_array($query);
				$department = $row1['department_id'];  
																 
                if(mysqli_num_rows($checkteacherresult) > 0)
                {
                    $up_query = "UPDATE teacher set firstname = '$fn', lastname = '$ln', department_name = '$department', email='$email' where username='$un'";
                    $up_result = mysqli_query($conn, $up_query);
                    $msg = 1;

                }else{
                    $teacherQuery = "INSERT INTO teacher (username,firstname,lastname,location,department_id, email, teacher_status,pass_stat) values ('$un','$fn','$ln','uploads/user.png','$department','$email','Unregistered','N/A')";
                    $result = mysqli_query($conn, $teacherQuery);
                    $msg = 1;
                } 
			
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: teachers.php');
            exit(0);
        }
        else
        {
            $_SESSION['message1'] = "Not Imported";
            header('Location: teachers.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message2'] = "Invalid File";
        header('Location: teachers.php');
        exit(0);
    }
}
?>