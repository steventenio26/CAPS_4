<?php
session_start();
include('dbcon.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
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
                $un = $row['0'];
                $ln = $row['1'];
                $fn = $row['2'];
				$class_name = $row['3'];
                $email = $row['4'];
				
                $checkstudent = "SELECT * from student where username = '$un' ";
                $checkstudentresult = mysqli_query($conn, $checkstudent);

				$query= mysqli_query($conn,"SELECT * from class where class_name = '$class_name' ")or die(mysqli_error());
				$row1 = mysqli_fetch_array($query);
				$class_name = $row1['class_id'];  
																 
                if(mysqli_num_rows($checkstudentresult) > 0)
                {
                    $up_query = "UPDATE student set firstname = '$fn', lastname = '$ln', class_id = '$class_name', email = '$email' where username='$un'";
                    $up_result = mysqli_query($conn, $up_query);
                    $msg = 1;
                }else{
                    $studentQuery = "INSERT INTO student (username,firstname,lastname,location,class_id, email,pass_stat) values ('$un','$fn','$ln','uploads/user.png','$class_name','$email','N/A')";
                    $result = mysqli_query($conn, $studentQuery);
                    $msg = 1;
                } 
			
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: students.php');
            exit(0);
        }
        else
        {
            $_SESSION['message1'] = "Not Imported";
            header('Location: students.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message2'] = "Invalid File";
        header('Location: students.php');
        exit(0);
    }
}
?>