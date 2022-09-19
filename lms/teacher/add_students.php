<?php
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
$class_id = $_GET['cid'];
include "navbar_teacher.php";

if (isset($_POST['add'])){
  $id = $_POST['id'];
  $full = $_POST['full'];
  $query1 = mysqli_query($conn,"SELECT * from teacher_class_student where student_id = '$id' and teacher_class_id = '$get_id'");
  $count = mysqli_num_rows($query1);

  if($count > 0){
    echo '<script type="text/javascript">';
    echo 'swal("'.$full.'", "is already in your class!", "error");';
    echo '</script>';
  }else{
   $sql= mysqli_query($conn,"INSERT INTO teacher_class_student (student_id,teacher_class_id,teacher_id) values('$id','$get_id','$session_id')");
   echo '<script type="text/javascript">';
   echo 'swal("'.$full.'", "was successfully added in your class!", "success").then(function(){ window.location="my_students.php?id='.$get_id.'&cid='.$class_id.'";});';
   echo '</script>';
  }

}

$sql='SELECT * FROM student LEFT JOIN class ON class.class_id = student.class_id';
$query = mysqli_query($conn, $sql);

?>


<div class="container-fluid">
    <div class="row">
        <?php 
        $students="active";
        include "class_sidebar.php"; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <p>My Students</p>            
          </div>
          
          <table class="table text-center" id="addclasstable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Coure Year And Section</th>
                <th scope="col">Add</th>
              </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                  $id = $row['student_id'];
                  $fullname = ucwords($row['firstname'] . " " . $row['lastname']);
                  ?>
              <tr>
                <td><img  class="img-rounded" src="../admin/<?php echo $row['location']; ?>" height="50" width="40"></td>
                <td><?php echo $fullname; ?></td>
                <td><?php echo $row['class_name']; ?></td>
                <td><a href="#" class="text-success" data-toggle="modal" data-target="#add<?php echo $id;?>"><span data-feather="user-plus"></span></a></td>
              </tr>
              <?php include "search_action.php";
            }?>
            </tbody>
          </table>
        </main>
    </div>
</div>

<?php include "footer.php"; ?>
