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
        $announce="active";
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
              <li class="breadcrumb-item active" aria-current="page">Announcements</li>
            </ol>
          </nav>
          </div>
          <?php include "announcement_list.php";?>

        </main>
    </div>
</div>

<?php include "footer.php"; ?>
