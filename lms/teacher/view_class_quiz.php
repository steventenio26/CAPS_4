<?php 
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
$quizid = $_GET['quizid'];
$q_id = $_GET['q'];
$quiz_id =$_GET['qid'];
$class_id =$_GET['cid'];
include "navbar_teacher.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $quiz="active";
        include "class_sidebar.php";
        $query = mysqli_query($conn,"SELECT * from teacher_class
        LEFT JOIN class ON class.class_id = teacher_class.class_id
        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
        WHERE teacher_class_id = '$get_id' ");
        $sec_row = mysqli_fetch_array($query);
        $class_name = ucwords($sec_row['class_name']).' ('.ucwords($sec_row['subject_code'].')');
        
        $sql = "SELECT * FROM teacher_class_student
        LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
        INNER JOIN class ON class.class_id = student.class_id WHERE teacher_class_id = '$get_id' order by firstname ASC";
        $result = mysqli_query($conn,$sql);
        $sql2 = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id = '$q_id'");
        $count = mysqli_num_rows($sql2);

        ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item"><?php echo $class_name; ?></li>
              <li class="breadcrumb-item"><a href="class_quiz.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">Class Quiz</a></li>
              <li class="breadcrumb-item active" aria-current="page">Quiz Score</li>
            </ol>
          </nav>
          </div>
          <div class="container-fluid">
          <div class="alert alert-primary">
              <h6>Students who submit quiz in: <?php echo $quizid; ?> </h6>
          </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Student Name</th>               
                    <th scope="col">Score</th>                
                    </tr>
                </thead>
                <tbody>
          <?php
            while ($row = mysqli_fetch_array($result)){
                $stud_id = $row['student_id'];
                $student = ucwords($row['firstname'].' '. $row['lastname']);

                $sql1="SELECT * FROM quiz_results WHERE quiz_id = '$q_id' AND student_id = '$stud_id' ";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($result1);
                $grade = $row1['correct_answer'];                         
          ?>
            <tr>
                <td><?php echo $student; ?></td>
                <td>
                <?php  
                    if($grade == ""){
                        echo "haven't taken the exam yet";
                    }else{
                        echo $grade . ' out of ' . $count;
                    }
                ?>
                </td>                
                </tr>
        <?php }?>
            </tbody>
        </table>
</div>


        </main>
    </div>
</div>

<?php include "footer.php"; ?>
