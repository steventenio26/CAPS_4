<div class="container-fluid">
    <div class="row">
    <?php

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        mysqli_query($conn,"DELETE from teacher_class_student where teacher_class_student_id = '$id'")or die(mysqli_error());
    }
    $query1 = mysqli_query($conn, "SELECT * FROM teacher_class
    LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id 
    WHERE teacher_class_id = '$get_id' ");

    $sql = "SELECT * FROM teacher_class_student
    LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
    WHERE teacher_class_id = '$get_id' order by lastname ASC";
    $my_student = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($my_student);
    ?>
    <div class="col-md-2"></div>
        <div class="col-md-8 mb-5">
            <p class="border-bottom h4 p-3">Head Teachers </p>
    <?php
        $row = mysqli_fetch_array($query1);
        $id = $row['teacher_id'];
        $fullname = ucwords($row['lastname'].' '.$row['firstname']);

        $dep_id = $row['department_id'];
        $query_dep = mysqli_query($conn, "SELECT * FROM department WHERE department_id = '$dep_id'");
        $dep_row = mysqli_fetch_array($query_dep);
        $teac_id = $dep_row['teacher_id'];
        $query_teac = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$teac_id'");
        $teac_row = mysqli_fetch_array($query_teac);
        $head_name = ucwords($teac_row['lastname'].' '.$teac_row['firstname']);

        if (mysqli_num_rows($query_teac) > 0){
    ?>
        <div class="col-12 p-1">
            <img src="../admin/<?php echo $teac_row['location']; ?>" alt="Teacher Profile" width="50rem" height="50rem" class="rounded-circle mr-3">
            <?php echo $head_name; ?>
        </div>
        <?php } else{ ?>
        <div class="col-12 alert alert-danger">
            <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span> No Head Teacher</h6>
        </div>
        <?php } ?>

        <p class="border-bottom h4 p-3">Teacher </p>
        <?php 
        if (mysqli_num_rows($query1) > 0){
        ?>
        <div class="col-12 p-1">
            <img src="../admin/<?php echo $row['location']; ?>" alt="Teacher Profile" width="50rem" height="50rem" class="rounded-circle mr-3">
            <?php echo $fullname; ?>
        </div>
        <?php } else{ ?>
        <div class="col-12 alert alert-danger">
            <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span> No Teacher</h6>
        </div>
        <?php } ?>

        <p class="border-bottom h4 p-3 mt-3 border-top">Students <a class="float-right h6"><?php echo $count.' students'; ?></a></p>
        <?php
    if ($count > 0){
    while($row = mysqli_fetch_array($my_student)){
    $id = $row['teacher_class_student_id'];
    $fullname = ucwords($row['lastname'].' '.$row['firstname']);
    ?>
        <div class="col-12 p-1">
            <img src="../admin/<?php echo $row['location']; ?>" alt="Student Profile" width="50rem" height="50rem" class="rounded-circle mr-3">
            <?php echo $fullname; ?>
        </div>
        <?php
        $delete_header = "Student";
        $delete_content ="student"; 
    include "delete_class_modal.php";
    } ?>
    </div>
    <div class="col-md-2"></div>
    <?php }else{ ?>
        <div class="col-12 alert alert-danger">
            <h6 class="text-center text-dark"><span data-feather="alert-triangle"></span> No Student</h6>
        </div>
    <?php } ?>
    </div>
</div>