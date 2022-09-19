<div class="container-fluid">
    <div class="row">
    <?php 
    $school_year_query = mysqli_query($conn,"SELECT * from school_year order by school_year DESC");
    $school_year_query_row = mysqli_fetch_array($school_year_query);
    $school_year = $school_year_query_row['school_year'];

    if ($dep_count > 0){
        $dep_class = mysqli_query($conn, "SELECT * from teacher_class
        LEFT JOIN class ON class.class_id = teacher_class.class_id
        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
        where NOT archive_status = '1' AND department_id = '$dep_id' and school_year = '$school_year' ");
        while($dep_class_row = mysqli_fetch_array($dep_class)){
            $id = $dep_class_row['teacher_class_id'];
            $class_id =$dep_class_row['class_id'];
            ?>
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-dark mb-3" style="max-width: 25rem; height: 13rem;">
                <div class="card-header"><span data-feather="book-open"></span>
                    Section: <?php echo ucwords($dep_class_row['class_name']); ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Subject: <?php echo ucwords($dep_class_row['subject_title']).' - '.ucwords($dep_class_row['subject_code']); ?></h5>
                    <p class="card-text">Description... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, officia!</p>
                </div>
                <div class="card-footer text-center text-muted">
                    <a href="my_students.php<?php echo '?id='.$id.'&cid='.$class_id; ?>" class="text-white card-link">Go to Class <span data-feather="arrow-right-circle"></span></a>
                </div>
            </div>
        </div>
    <?php  }
    } else{

    $query = mysqli_query($conn,"SELECT * from teacher_class
    LEFT JOIN class ON class.class_id = teacher_class.class_id
    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
    where NOT archive_status = '1' AND teacher_id = '$session_id' and school_year = '$school_year' ");
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
                    <div class="float-right">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="card-link text-light"><span data-feather="more-vertical"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#archive<?php echo $id;?>"><span data-feather="archive"></span>
                                Archive</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal archive class -->
                <div class="modal fade" id="archive<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header text-dark">
                            <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="archive"></span>
                            Archive Classroom</h6>
                            </div>
                            <div class="modal-body">
                                <p class="text-dark">
                                Archiving a class causes it to be archived for all participants.
                                </p>
                                <p class="text-dark">
                                Archived classes can't be modified by teachers or students unless they are restored.
                                </p>
                                <h6 class="text-dark text-center"><?php echo 'Section: '.ucwords($row['class_name']).'</br> Subject: '.ucwords($row['subject_title']).' - '.ucwords($row['subject_code']);?></h6>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light text-secondary" data-dismiss="modal">Cancel</button>
                            <button name="archive_class" class="btn btn-outline-light text-danger"><span data-feather="archive"></span>
                            Archive</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- end of modal -->
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
                <h6 class="text-dark text-center"><span data-feather="alert-triangle"></span> No class currently added</h6>
            </div>
       <?php } } ?>
    </div>
</div>