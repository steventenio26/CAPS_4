<?php 
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
$post_id = $_GET['assid'];
$class_id = $_GET['cid'];
include "navbar_teacher.php";

$query1 = mysqli_query($conn,"SELECT * FROM assignment WHERE assignment_id = '$post_id'")or die(mysqli_error());
$row1 = mysqli_fetch_array($query1);

if(isset($_POST['grade'])){
    $grade = $_POST['grade'];
    $id = $_POST['id'];
    if(!empty($grade)){
        mysqli_query($conn,"UPDATE student_assignment SET grade = '$grade' where student_assignment_id = '$id'")or die(mysqli_error());
        echo '<script type="text/javascript">';
        echo 'swal("Success", "Assignment Score was Successfully Added", "success");';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'swal("Error", "Empty fields", "error");';
        echo '</script>';        
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $assign="active";
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
            <?php
              if ($sec_row['archive_status'] == '1'){
              ?>
              <li class="breadcrumb-item">Archived Classroom</li>
              <?php }?>
              <li class="breadcrumb-item"><?php echo $class_name; ?></a></li>
              <li class="breadcrumb-item"><a href="assignment.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">Upload Assignment</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Who Submit Assignment</li>
            </ol>
          </nav>
          </div>        
        <div class="container-fluid">
          <div class="alert alert-primary">
              <h6>Submit Assignment in: <?php echo $row1['fname']; ?></h6>
          </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Date Uploaded</th>
                <th scope="col">File Name</th>
                <th scope="col">Description</th>
                <th scope="col">Submitted By</th>
                <th scope="col">Download File</th>
                <th scope="col">Score</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

               <?php 
               $query = mysqli_query($conn,"SELECT * FROM student_assignment 
               LEFT JOIN student ON student.student_id  = student_assignment.student_id
               WHERE assignment_id = '$post_id'  ORDER BY assignment_fdatein DESC")or die(mysqli_error());
               while($row = mysqli_fetch_array($query)){
                $id  = $row['student_assignment_id'];
                $grade = $row['grade']; 
                
                
                ?>
                    <tr>
                    <td><?php echo $row['assignment_fdatein']; ?></td>
                    <td><?php  echo $row['fname']; ?></td>
                    <td><?php echo $row['fdesc']; ?></td>                                
                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>                                
                    <td><a href="<?php echo $row['floc']; ?>" class="text-primary"><span data-feather="download"></span></a></td>                                            
                    
                    <td style="width:80px">
                    <?php 
                    if ($dep_count < 1 && ($sec_row['archive_status'] == '0')){ ?>
                        <p class="text-dark"><?php echo $grade; ?></p>
                    <?php } else{ ?>
                        <form action="" method="POST">
                            <input type="text" name="grade" class="form-control text-center" value="<?php echo $grade;?>" autocomplete="off">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                        </form>
                    <?php } ?>
                    </td>                                        
                    </tr>
                        <?php
                        } ?>
                </tbody>
        </table>
        </div>       
        </main>
    </div>
</div>

<?php include "footer.php"; ?>
