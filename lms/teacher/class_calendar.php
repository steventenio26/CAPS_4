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
        $calendar="active";
        include "class_sidebar.php"; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <p>Class Calendar</p>
          </div>
          
          <div id="calendar">
            
          </div>
          

        </main>
    </div>
</div>

<?php include "footer.php"; ?>
