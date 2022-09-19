<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php include('navbar_teacher.php');

$school_year_query = mysqli_query($conn,"SELECT * from school_year order by school_year DESC")or die(mysqli_error());
$school_year_query_row = mysqli_fetch_array($school_year_query);
$school_year = $school_year_query_row['school_year'];

if (isset($_POST['add'])){
    $quiz_id = $_POST['quiz_id'];
    $time = $_POST['time'] * 60;
    $id = $_POST['sel'];
    $name_notification  = 'Add Practice Exam file';
    
    if (!empty($quiz_id) && !empty($time) && !empty($id)){
        $N = count($id);
        for($i=0; $i < $N; $i++){
            $result = mysqli_query($conn,"INSERT INTO class_exam (teacher_class_id,exam_time,exam_id) VALUES('$id[$i]','$time','$quiz_id')")or die(mysqli_error());
            $result1 = mysqli_query($conn,"INSERT INTO notification (teacher_class_id,notification,date_of_notification,link) VALUES('$id[$i]','$name_notification',NOW(),'select_exam.php')")or die(mysqli_error());        
        }
        if ($result && $result1){
            echo '<script type="text/javascript">';
            echo 'swal("Success", "Exam was successfully added!", "success");';
            echo '</script>';
        }else{
            echo '<script type="text/javascript">';
            echo 'swal("Error", "Exam was not successfully added!", "error");';
            echo '</script>';            
        }
    }else{
        echo '<script type="text/javascript">';
        echo 'swal("Error", "Empty fields!", "error");';
        echo '</script>';            
    }
}

if (isset($_POST['save_exam'])){
    $quiz_title = $_POST['quiz_title'];
    $description = $_POST['description'];
    $result = mysqli_query($conn,"INSERT INTO exam (exam_title,exam_description,date_added,teacher_id) VALUES('$quiz_title','$description',NOW(),'$session_id')")or die(mysqli_error());
    if($result){
        echo '<script type="text/javascript">';
        echo 'swal("Success", "Quiz was successfully added!", "success");';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'swal("Error", "Quiz was not successfully added!", "error");';
        echo '</script>';
    }
}

if (isset($_POST['delete'])){
    $id = $_POST['id'];
    $result = mysqli_query($conn,"DELETE FROM exam WHERE exam_id = '$id'");
    $result2 = mysqli_query($conn,"DELETE FROM class_exam WHERE exam_id = '$id'");
}
?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        $exam_teacher="active";
        include "teacher_sidebar.php";?>
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item active" aria-current="page">Create Exam</li>
            </ol>
            </nav>
                <div class="btn-toolbar mb-2 mr-4">
                    <button class="btn btn-sm btn-outline-secondary mr-2" data-toggle="modal" data-target="#addexam"><span data-feather="plus-circle"></span>
                    Add Exam</button>
                    <?php include "add_quiz_class.php"; ?>
                </div>
            </div>
            
            
            <div class="container-fluid">
            
                    <?php
                    $query = mysqli_query($conn,"SELECT * FROM exam WHERE teacher_id = '$session_id'  ORDER BY date_added DESC ")or die(mysqli_error());
                    if(mysqli_num_rows($query) > 0){ ?>
                 <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Exam Title</th>               
                    <th scope="col">Description</th>                
                    <th scope="col">Date Added</th>
                    <th scope="col">Questions</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Deploy Exam</th>

                    </tr>
                </thead>
                <tbody>
                 
                 <?php
                 while($row = mysqli_fetch_array($query)){
                    $id  = $row['exam_id'];
                    $quiz_title = $row['exam_title'];
                    $description = $row['exam_description'];
                    ?>
                <tr>
                <td><?php echo $quiz_title; ?></td>
                <td><?php  echo $description; ?></td>
                <td><?php echo $row['date_added']; ?></td>                                
                <td><a href="exam_question.php<?php echo '?id='.$id; ?>" class="text-primary"><span data-feather="help-circle"></span></a></td>                                
                <td><a href="#" class="text-success" data-toggle="modal" data-target="#exam_response<?php echo $id;?>"><span data-feather="edit-2"></span></a></td>                                
                <td><a href="#" class="text-danger" data-toggle="modal" data-target="#exam_delete<?php echo $id;?>"><span data-feather="trash-2"></span></a></td>                                
                <td><a href="#" class="text-info" data-toggle="modal" data-target="#exam_deploy<?php echo $id;?>"><span data-feather="activity"></span></a></td>                                
                </tr>
        <?php
        include "edit_exam.php";        
        } ?>
        </tbody>
        </table>
       <?php }else{ ?>
            <div class="col-12 alert alert-danger">
                <h6 class="text-dark text-center"><span data-feather="alert-triangle"></span> No quiz currently added</h6>
            </div>
      <?php  } ?>
            
        </div>
        </main>
      </div>
    </div>
        <?php include "footer.php";?>