<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php include('navbar_teacher.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        $archive="active";
        include "teacher_sidebar.php"; 
        ?>
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item active" aria-current="page">Archived Class</li>
            </ol>
          </nav>
          </div>
          <div class="container-fluid">
            <div class="row">
            <?php 
            $school_year_query = mysqli_query($conn,"SELECT * from school_year order by school_year DESC");
            $school_year_query_row = mysqli_fetch_array($school_year_query);
            $school_year = $school_year_query_row['school_year'];

            $query = mysqli_query($conn,"SELECT * from teacher_class
            LEFT JOIN class ON class.class_id = teacher_class.class_id
            LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
            where NOT archive_status = '0' AND teacher_id = '$session_id' and school_year = '$school_year' ");
            $count = mysqli_num_rows($query);
            if ($count > 0){
                while($row = mysqli_fetch_array($query)){
                    $id = $row['teacher_class_id'];
                    $class_id =$row['class_id'];
            ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-white bg-dark mb-3" style="max-width: 25rem; height: 13rem;">
                        <div class="card-header"><span data-feather="book-open"></span>
                            Section: <?php echo ucwords($row['class_name']); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Subject: <?php echo ucwords($row['subject_title']).' - '.ucwords($row['subject_code']); ?></h5>
                            <p class="card-text">Description... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, officia!</p>
                        </div>
                        <div class="card-footer text-center text-muted">
                            <a href="my_students.php<?php echo '?id='.$id.'&cid='.$class_id; ?>" class="text-white card-link">Go to Class <span data-feather="arrow-right-circle"></span></a>
                        </div>
                    </div>
                </div><?php }}else{ ?>
                    <div class="col-12 alert alert-danger">
                        <h6 class="text-dark text-center"><span data-feather="alert-triangle"></span> None of your classes have been archived</h6>
                    </div>
            <?php } ?>
            </div>
</div>

          

        </main>
      </div>
    </div>
        <?php include "footer.php";?>