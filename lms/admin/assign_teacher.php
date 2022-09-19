<?php include('header.php'); ?>
    <?php  include('session.php'); ?>
		<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
   <?php include('navbarmain.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		 <div class="col-5">
		        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Teacher to Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Teachers</label>
                    <select class="form-control" name="teacher">
                      <option></option>
                      <?php
                      $query = mysqli_query($conn, "SELECT * FROM teacher ORDER BY firstname ASC");
                      while ($row = mysqli_fetch_array($query)){
                        $teacher_id = $row['teacher_id'];
                        $sql = mysqli_query($conn,"SELECT * FROM department WHERE teacher_id = '$teacher_id'");
                        $row1 = mysqli_fetch_array($sql);
                        $department_id = $row['department_id'];
                        $fullname = ucwords($row['firstname']).' '.ucwords($row['lastname']);
                        if ($department_id != $row1['department_id']){
                      ?>
                      <option value="<?php echo $teacher_id; ?>"><?php echo $fullname; ?></option>
                      <?php 
                      } }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sections</label>
                    <select class="form-control" name="section">
                      <option></option>
                      <?php 
                      $query = mysqli_query($conn, "SELECT * FROM class ORDER BY class_name ASC");
                      while ($row = mysqli_fetch_array($query)){
                        $class_id = $row['class_id'];
                        $class_name = ucwords($row['class_name']);
                      ?>
                      <option value="<?php echo $class_id; ?>"><?php echo $class_name; ?></option>
                      <?php 
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Subjects</label>
                    <select class="form-control" name="subject">
                      <option></option>
                      <?php 
                      $query = mysqli_query($conn, "SELECT * FROM subject ORDER BY subject_title ASC");
                      while ($row = mysqli_fetch_array($query)){
                        $subject_id = $row['subject_id'];
                        $subject_name = ucwords($row['subject_title']).' - '.ucwords($row['subject_code']);
                      ?>
                      <option value="<?php echo $subject_id; ?>"><?php echo $subject_name; ?></option>
                      <?php 
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>School Year</label>
                    <select class="form-control" name="school_year">
                      <option></option>
                      <?php 
                      $query = mysqli_query($conn, "SELECT * FROM school_year order by school_year DESC");
                      while ($row = mysqli_fetch_array($query)){
                        $school_year = ucwords($row['school_year']);
                      ?>
                      <option value="<?php echo $school_year; ?>"><?php echo $school_year; ?></option>
                      <?php 
                      }
                      ?>
                    </select>
                  </div>
				
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
			 				<?php
if (isset($_POST['delete_classroom'])){
    $id=$_POST['selector'];
    $N = count($id);
    for($i=0; $i < $N; $i++)
    {
        mysqli_query($conn,"UPDATE teacher_class SET archive_status = '1' WHERE teacher_class_id = '$id[$i]'");
        echo '<script>';
        echo 'window.location = "assign_teacher.php";';
        echo '</script>';
    }
}


if (isset($_POST['save'])){
$teacher = $_POST['teacher'];
$subject = $_POST['subject'];
$section = $_POST['section'];
$school_year = $_POST['school_year'];

$query1 = mysqli_query($conn, "SELECT department_id FROM teacher WHERE teacher_id = '$teacher'");
$depart_row = mysqli_fetch_array($query1);
$department_id = $depart_row['department_id'];


$query = mysqli_query($conn,"SELECT * from teacher_class where subject_id = '$subject' AND class_id = '$section' AND school_year = '$school_year' ")or die(mysqli_error());
$row_query = mysqli_fetch_array($query);
$teacher_class_id = $row_query['teacher_class_id'];
$count = mysqli_num_rows($query);

if ($count > 0){ 
    if ($row_query['archive_status'] == 1){
        mysqli_query($conn,"UPDATE teacher_class SET teacher_id = '$teacher', archive_status = '0' WHERE teacher_class_id = '$teacher_class_id'");
        mysqli_query($conn,"DELETE FROM teacher_class_student WHERE teacher_class_id = '$teacher_class_id'");
        $insert_query = mysqli_query($conn,"SELECT * FROM student WHERE class_id = '$section'");
        while($row = mysqli_fetch_array($insert_query)){
            $id = $row['student_id'];
            mysqli_query($conn,"INSERT INTO teacher_class_student (teacher_id,student_id,teacher_class_id) VALUES ('$teacher','$id','$teacher_class_id')");
        }
        echo '<script>';
        echo 'window.location = "assign_teacher.php";';
        echo '</script>';
    }else{
?>
<script>
swal("ERROR", "This Classroom is Already Exist!", "error");
</script>
<?php
    }
}else{
mysqli_query($conn,"INSERT into teacher_class (teacher_id,class_id,subject_id,department_id,thumbnails,school_year) VALUES('$teacher','$section','$subject','$department_id','admin/uploads/thumbnails.jpg','$school_year')");

$teacher_class = mysqli_query($conn,"SELECT * FROM teacher_class ORDER BY time_stamp DESC LIMIT 1");
$teacher_row = mysqli_fetch_array($teacher_class);
$teacher_class_id = $teacher_row['teacher_class_id'];
mysqli_query($conn,"DELETE FROM teacher_class_student WHERE teacher_class_id = '$teacher_class_id'");

$insert_query = mysqli_query($conn,"SELECT * FROM student WHERE class_id = '$section'");
while($row = mysqli_fetch_array($insert_query)){
    $id = $row['student_id'];
    mysqli_query($conn,"INSERT INTO teacher_class_student (teacher_id,student_id,teacher_class_id) VALUES ('$teacher','$id','$teacher_class_id')");
}
?>
<script>
window.location = "assign_teacher.php";
</script>
<?php
}
}
?>
            </div>
		 </div>
          <div class="col-7">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Classroom</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <form action="" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i> Archive Classroom
                </button>
                <!-- modal delete -->
				<div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Archive Classroom</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible text-center">                
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                                Warning! Are you sure you want to Archive this classroom?
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="delete_classroom" class="btn btn-danger">Archive</button>
                        </div>
                    </div>
                    </div>
                </div>
				 
                  <thead>
                  <tr>
                  			<th>Select</th>
												<th>Teacher</th>
												<th>Section</th>
												<th>Subject</th>
											
												<th>Edit</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $user_query = mysqli_query($conn,"SELECT * from teacher_class
                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                        LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id WHERE NOT archive_status = '1' ORDER BY teacher_class_id DESC")or die(mysqli_error());
                        while($row = mysqli_fetch_array($user_query)){
                        $teacher_class_id = $row['teacher_class_id'];
                        $teacher_name = ucwords($row['firstname'].' '.ucwords($row['lastname']));
                        $section = ucwords($row['class_name']);
                        $subject = ucwords($row['subject_title']).' - '.ucwords($row['subject_code']);
                    ?>
                    <tr>
                        <td width="30">
                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $teacher_class_id; ?>">
                        </td>
                        <td><?php echo $teacher_name; ?></td>
                        <td><?php echo $section; ?></td>
                        <td><?php echo $subject; ?></td>
                
                        <td width="30"><a href="edit_assign_teacher.php?id=<?php echo $teacher_class_id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                    </tr>
                        <?php } ?>
                  </tbody>
                
                </table>
				</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php'); ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
