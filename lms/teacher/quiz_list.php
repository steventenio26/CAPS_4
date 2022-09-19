<div class="container-fluid">        
            <?php

            if(isset($_POST['delete_quiz'])){
                $id = $_POST['id'];
                $result = mysqli_query($conn,"DELETE FROM class_quiz where class_quiz_id='$id'")or die(mysqli_error());
            }

            $sql = "SELECT * FROM class_quiz 
            LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
            WHERE teacher_class_id = '$get_id' 
            ORDER BY date_deploy DESC ";
            $query = mysqli_query($conn,$sql) or die(mysqli_error());

            if (mysqli_num_rows($query) > 0){ ?>
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Quiz Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quiz Time (in minutes)</th>
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
                    $id = $row['class_quiz_id'];
                    $quiz_id = $row['quiz_id'];
                    $qid = $row['quiz_title']; ?>
                        <tr>
                            <td><?php echo $row['quiz_title']; ?></td>
                            <td><?php  echo $row['quiz_description']; ?></td>
                            <td><?php echo $row['quiz_time']/60; ?></td>
                            <td><?php echo $row['date_deploy']; ?></td>                
                            <td><a data-toggle="tooltip" data-placement="bottom" title="View analysis" href="analysis_class_quiz.php?id=<?php echo $get_id;?>&qid=<?php echo $id.'&cid='.$class_id.'&quizid='.$qid.'&q='.$quiz_id;?>" class="text-primary"><span data-feather="trending-up"></span></a></td>
                            <td><a data-toggle="tooltip" data-placement="bottom" title="View students who take quiz" href="view_class_quiz.php?id=<?php echo $get_id;?>&qid=<?php echo $id.'&cid='.$class_id.'&quizid='.$qid.'&q='.$quiz_id;?>" class="text-success"><span data-feather="eye"></span></a></td>
                            <?php
                            if ($dep_count < 1){
                            ?>
                            <td><a href="#" data-toggle="modal" data-target="#delete_quiz<?php echo $id;?>" class="text-danger"><span data-feather="trash-2"></span></a></td>
                            <?php }
                            ?>
                        </tr>                        
        <?php 
            include "delete_class_modal.php";
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

