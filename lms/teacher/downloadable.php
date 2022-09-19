<?php 
include "header_dashboard.php";
include "../session.php";
$get_id = $_GET['id'];
$class_id = $_GET['cid'];
include "navbar_teacher.php";

if(isset($_POST['submit'])){
  if(!empty($_FILES['file_upload']) && $_FILES['file_upload']['error'] == 0){
    $uploaded_by_query = mysqli_query($conn,"SELECT * FROM teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
    $uploaded_by_query_row = mysqli_fetch_array($uploaded_by_query);
    $uploaded_by = $uploaded_by_query_row['firstname']." ".$uploaded_by_query_row['lastname'];

    $name = $_POST['name'];
    $description = $_POST['description'];
    $name_notification  = 'Add Downloadable Materials file name'." ".'<b>'.$name.'</b>';
    $filename = basename($_FILES['file_upload']['name']);
    $pname = rand(1000,10000).'_FILE_'.$filename;
    $tname = $_FILES['file_upload']['tmp_name'];
    $upload_dir = '../admin/uploads/'.$pname;

    if(!file_exists($upload_dir)){
      if(move_uploaded_file($tname,$upload_dir)){
        mysqli_query($conn,"INSERT INTO notification (teacher_class_id,notification,date_of_notification,link) VALUES('$get_id','$name_notification',NOW(),'downloadable_student.php')")or die(mysqli_error());

        $sql = "INSERT INTO files (fdesc,floc,fdatein,teacher_id,class_id,fname,uploaded_by) VALUES ('$description','$upload_dir',NOW(),'$session_id','$get_id','$name','$uploaded_by')";
        $result = mysqli_query($conn,$sql);

        if($result){
          echo '<script type="text/javascript">';
          echo 'swal("Success", "record was saved in the database and the file was uploaded!", "success");';
          echo '</script>';
        }else{
          echo '<script type="text/javascript">';
          echo 'swal("Error", "record was not saved in the database but file was uploaded!", "error");';
          echo '</script>';
        }
      }else{
        echo '<script type="text/javascript">';
        echo 'swal("Error", "Uploading file was not successful!", "error");';
        echo '</script>';
      }
    }else{
      echo '<script type="text/javascript">';
      echo 'swal("Error", "File is already uploaded!", "error");';
      echo '</script>';
    }
  }else{
    echo '<script type="text/javascript">';
    echo 'swal("Error", "File empty!", "error");';
    echo '</script>';
  }
}

?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $materials="active";
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
              <li class="breadcrumb-item"><a href="teacher_archive.php">Archived Classroom</a></li>
              <?php }?>
              <li class="breadcrumb-item"><?php echo $class_name; ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Downloadable Materials</li>
            </ol>
          </nav>
            <?php 
            if (($dep_count < 1) && ($sec_row['archive_status'] == '0')){ ?>
              <div class="btn-toolbar mb-2 mr-4">
                <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter"><span data-feather="upload"></span>
                Upload File</button>
              </div>
            <?php }
            ?>
          </div>
          <?php include "upload_files.php"; ?>
          <?php include "downloadable_list.php";?>

        </main>
    </div>
</div>
<?php include "footer.php"; ?>