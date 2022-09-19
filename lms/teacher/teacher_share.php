<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php include('navbar_teacher.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        $file="active";
        include "teacher_sidebar.php"; ?>
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <p>Shared Files</p>
            </div>            
                 
        </main>
      </div>
    </div>
        <?php include "footer.php";?>