<?php 
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
$class_id = $_GET['cid'];
include "navbar_teacher.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $grade="active";
        include "class_sidebar.php";
        $query = mysqli_query($conn,"SELECT * from teacher_class
        LEFT JOIN class ON class.class_id = teacher_class.class_id
        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
        WHERE teacher_class_id = '$get_id' ");
        $sec_row = mysqli_fetch_array($query);
        $class_name = ucwords($sec_row['class_name']).' ('.ucwords($sec_row['subject_code'].')');
        ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item"><?php echo $class_name; ?></li>
              <li class="breadcrumb-item active" aria-current="page">Grade Book</li>
            </ol>
          </nav>            
          </div>
          <div class="container-fluid">                        
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Quiz</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Exam</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Assignment</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div id="home" class="container tab-pane active"><br>
                  <?php
                $sql = "SELECT * FROM teacher_class_student
                LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                INNER JOIN class ON class.class_id = student.class_id WHERE teacher_class_id = '$get_id' order by lastname ASC";
                $query = mysqli_query($conn,$sql);
                $sql4 = mysqli_query($conn,"SELECT * FROM class_quiz LEFT JOIN quiz ON quiz.quiz_id = class_quiz.quiz_id WHERE teacher_class_id = '$get_id'");
                $count = mysqli_num_rows($sql4);
                if($count > 0){
                ?>
                    <table class="table text-center">
                          <thead class="thead-dark">
                              <tr>
                              <th scope="col">Student Name</th>                            
                              <?php while ($row = mysqli_fetch_array($sql4)) {
                                $quiz_title = $row['quiz_title'];?>
                              <th scope="col"><?php echo 'Quiz ('.$quiz_title.')';?></th>
                              <?php }?>              
                              <!-- <th scope="col">Activity</th>                
                              <th scope="col">Project</th>                
                              <th scope="col">Examination</th>                 -->
                              </tr>
                          </thead>
                          <tbody>
              <?php   while($row = mysqli_fetch_array($query)){
                          $id = $row['student_id'];
                          $student = ucwords($row['lastname'].' '.$row['firstname']);                          
                          $sql1 = mysqli_query($conn,"SELECT * FROM quiz_results WHERE student_id = '$id'");                        
                          ?>
                              <tr>
                                  <td><?php echo $student; ?></td>
                                  <?php for ($i = 0; $i < $count; $i++) { ?>
                                  <td>
                                    <?php
                                    $row2 = mysqli_fetch_array($sql1);
                                        if($row2['correct_answer'] == ""){
                                            echo "haven't taken the exam yet";
                                        }else{
                                            echo $row2['correct_answer'];
                                        }
                                    ?>
                                    </td>
                                  <?php } ?>
                              </tr>                        
              <?php }?>
                          </tbody>
                      </table>
                      <?php }else{ ?>
                        <div class="alert alert-danger">
                          <p class="h6 text-dark text-center">
                            No Quiz Records
                          </p>
                        </div>
                      <?php }?>
                  </div>

                  <div id="menu2" class="container tab-pane fade"><br>
                  <?php
                $sql = "SELECT * FROM teacher_class_student
                LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                INNER JOIN class ON class.class_id = student.class_id WHERE teacher_class_id = '$get_id' order by lastname ASC";
                $query = mysqli_query($conn,$sql);
                $sql4 = mysqli_query($conn,"SELECT * FROM class_exam LEFT JOIN exam ON exam.exam_id = class_exam.exam_id WHERE teacher_class_id = '$get_id'");
                $count = mysqli_num_rows($sql4);
                if($count > 0){
                ?>
                    <table class="table text-center">
                          <thead class="thead-dark">
                              <tr>
                              <th scope="col">Student Name</th>                            
                              <?php while ($row = mysqli_fetch_array($sql4)) {
                                $quiz_title = $row['exam_title'];?>
                              <th scope="col"><?php echo 'Exam ('.$quiz_title.')';?></th>
                              <?php }?>              
                              <!-- <th scope="col">Activity</th>                
                              <th scope="col">Project</th>                
                              <th scope="col">Examination</th>                 -->
                              </tr>
                          </thead>
                          <tbody>
              <?php   while($row = mysqli_fetch_array($query)){
                          $id = $row['student_id'];
                          $student = ucwords($row['lastname'].' '.$row['firstname']);                          
                          $sql1 = mysqli_query($conn,"SELECT * FROM exam_results WHERE student_id = '$id'");                        
                          ?>
                              <tr>
                                  <td><?php echo $student; ?></td>
                                  <?php for ($i = 0; $i < $count; $i++) { ?>
                                    <td>
                                    <?php
                                    $row2 = mysqli_fetch_array($sql1);
                                        if($row2['correct_answer'] == ""){
                                            echo "haven't taken the exam yet";
                                        }else{
                                            echo $row2['correct_answer'];
                                        }
                                    ?>
                                    </td>
                                    <?php } ?>
                              </tr>                        
              <?php }?>
                          </tbody>
                      </table>
                      <?php }else{ ?>
                        <div class="alert alert-danger">
                          <p class="h6 text-dark text-center">
                            No Exam Records
                          </p>
                        </div>
                      <?php }?>
                  </div>

                  <div id="menu1" class="container tab-pane fade"><br>
                  <?php
                $sql = "SELECT * FROM teacher_class_student
                LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                INNER JOIN class ON class.class_id = student.class_id WHERE teacher_class_id = '$get_id' order by lastname ASC";
                $query = mysqli_query($conn,$sql);
                $sql4 = mysqli_query($conn,"SELECT * FROM assignment WHERE class_id = '$get_id'");
                $count = mysqli_num_rows($sql4);
                if($count > 0){
                ?>
                  <table class="table text-center">
                          <thead class="thead-dark">
                              <tr>
                              <th scope="col">Student Name</th>                            
                              <?php while ($row = mysqli_fetch_array($sql4)) {
                                $ass_title = $row['fname'];?>
                              <th scope="col"><?php echo 'Assignment ('.$ass_title.')';?></th>
                              <?php }?>              
                              <!-- <th scope="col">Activity</th>                
                              <th scope="col">Project</th>                
                              <th scope="col">Examination</th>                 -->
                              </tr>
                          </thead>
                          <tbody>
              <?php   while($row = mysqli_fetch_array($query)){
                          $id = $row['student_id'];
                          $student = ucwords($row['lastname'].' '.$row['firstname']);
                          $sql = mysqli_query($conn,"SELECT * FROM student_assignment LEFT JOIN assignment ON assignment.assignment_id = student_assignment.assignment_id WHERE student_id = '$id' AND class_id = '$get_id'");                                                    
                          ?>
                              <tr>
                                  <td><?php echo $student; ?></td>
                                  <?php for ($i = 0; $i < $count; $i++) { ?>
                                  <td>
                                  <?php
                                  $row1 = mysqli_fetch_array($sql);
                                  if ($row1['grade'] == ""){
                                    echo "0";
                                  } else{
                                    echo $row1['grade'];
                                  }
                                  ?>
                                  </td>
                                  <?php }?>
                              </tr>                        
              <?php }?>
                          </tbody>
                      </table>
                      <?php }else{?>
                        <div class="alert alert-danger">
                          <p class="h6 text-center text-dark">
                            No Assignments Records
                          </p>
                        </div>
                      <?php }?>
                  </div>
                </div>
              </div>                                       
    </div>

        </main>
    </div>
</div>

<?php include "footer.php"; ?>
