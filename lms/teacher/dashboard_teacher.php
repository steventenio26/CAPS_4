<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php include('navbar_teacher.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        $class="active";
        include "teacher_sidebar.php"; 
        
        if(isset($_POST['addclass'])){
          $subject_id = $_POST['subject_id'];
          $class_id = $_POST['class_id'];
          $school_year = $_POST['school_year'];

          $query = mysqli_query($conn,"SELECT * FROM teacher_class WHERE subject_id = '$subject_id' AND class_id = '$class_id' AND school_year = '$school_year' ");
          $count = mysqli_num_rows($query);
          
          if ($count > 0){ 
            echo '<script type="text/javascript">';
            echo 'swal("ERROR", "This subject is already in your added!", "error");';
            echo '</script>';

          }else{
            mysqli_query($conn,"INSERT INTO teacher_class (teacher_id,subject_id,class_id,thumbnails,school_year) VALUES('$session_id','$subject_id','$class_id','admin/uploads/thumbnails.jpg','$school_year')");

            $teacher_class = mysqli_query($conn,"SELECT * FROM teacher_class ORDER BY teacher_class_id DESC");
            $teacher_row = mysqli_fetch_array($teacher_class);
            $teacher_id = $teacher_row['teacher_class_id'];


            $insert_query = mysqli_query($conn,"SELECT * FROM student WHERE class_id = '$class_id'");
            while($row = mysqli_fetch_array($insert_query)){
              $id = $row['student_id'];
              mysqli_query($conn,"INSERT INTO teacher_class_student (teacher_id,student_id,teacher_class_id) VALUES ('$session_id','$id','$teacher_id')")or die(mysqli_error());
              echo "yes";
            }
          }
        }

        if (isset($_POST['archive_class'])){
          $teacher_class_id = $_POST['id'];
          mysqli_query($conn,"UPDATE teacher_class SET archive_status = '1' WHERE teacher_class_id = '$teacher_class_id'");
        }
        ?>
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item active" aria-current="page">My Class</li>
            </ol>
          </nav>
          </div>

          <?php include "teacher_class.php"; ?>

          

        </main>
      </div>
    </div>
        <?php include "footer.php";?>