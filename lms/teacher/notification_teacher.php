<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php include('navbar_teacher.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        $notif="active";
        include "teacher_sidebar.php"; ?>
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item active" aria-current="page">Notification</li>
              </ol>
            </nav>
            </div>
            <div id="notif_show" class="container mb-3"></div>
          

        </main>
      </div>
    </div>
        <?php include "footer.php";?>