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
        $exam="active";
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
              <li class="breadcrumb-item active" aria-current="page">Class Exam</li>
            </ol>
          </nav>
          </div>
          <div class="container-fluid">        
            <?php

            if(isset($_POST['delete_exam'])){
                $id = $_POST['id'];
                $result = mysqli_query($conn,"DELETE FROM class_exam where class_exam_id='$id'")or die(mysqli_error());
            }

            $sql = "SELECT * FROM class_exam 
            LEFT JOIN exam ON exam.exam_id  = class_exam.exam_id
            WHERE teacher_class_id = '$get_id' 
            ORDER BY date_deploy DESC ";
            $query = mysqli_query($conn,$sql) or die(mysqli_error());

            if (mysqli_num_rows($query) > 0){ ?>
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Exam Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Exam Time (in minutes)</th>
                        <th scope="col">Date added</th>                
                        <th scope="col">Analysis</th>                
                        <th scope="col">View Score</th>
                        <?php
                        if ($dep_count < 1){
                        ?>          
                        <th scope="col">Delete</th>
                        <?php }
                        ?>               
                        </tr>
                    </thead>
                    <tbody>
        <?php   while($row = mysqli_fetch_array($query)){
                    $id = $row['class_exam_id'];
                    $quiz_id = $row['exam_id'];
                    $qid = $row['exam_title']; ?>
                        <tr>
                            <td><?php echo $row['exam_title']; ?></td>
                            <td><?php  echo $row['exam_description']; ?></td>
                            <td><?php echo $row['exam_time']/60; ?></td>
                            <td><?php echo $row['date_deploy']; ?></td>                
                            <td><a data-toggle="tooltip" data-placement="bottom" title="View analysis" href="analysis_class_exam.php?id=<?php echo $get_id;?>&qid=<?php echo $id.'&cid='.$class_id.'&quizid='.$qid.'&q='.$quiz_id;?>" class="text-primary"><span data-feather="trending-up"></span></a></td>
                            <td><a data-toggle="tooltip" data-placement="bottom" title="View students who take quiz" href="view_class_exam.php?id=<?php echo $get_id;?>&qid=<?php echo $id.'&cid='.$class_id.'&quizid='.$qid.'&q='.$quiz_id;?>" class="text-success"><span data-feather="eye"></span></a></td>
                            <?php
                            if ($dep_count < 1){
                            ?>
                            <td><a href="#" data-toggle="modal" data-target="#delete_exam<?php echo $id;?>" class="text-danger"><span data-feather="trash-2"></span></a></td>
                            <?php }
                            ?>
                        </tr>      
                        <!-- Modal delete quiz class -->
                        <div class="modal fade" id="delete_exam<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="trash-2"></span>
                                Delete Exam?</h6>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">
                                    Are you sure you want to delete this exam?
                                    </p>
                                    <h6 class="text-dark text-center"><?php echo $row['exam_title'];?></h6>
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light text-secondary" data-dismiss="modal">Cancel</button>
                                <button name="delete_exam" class="btn btn-outline-light text-danger"><span data-feather="trash-2"></span>
                                Delete</button>
                                </div>
                            </form>
                            
                            </div>
                        </div>
                        </div>
                        <!-- end of modal -->                  
        <?php 
        }?>
                    </tbody>
                </table>
                <?php }else{ ?>
                    <div class="alert alert-danger">
                        <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span>
                        No quiz currently added</h6>
                    </div>
               <?php }  ?>
</div>



        </main>
    </div>
</div>

<?php include "footer.php"; ?>
