<?php include('header.php'); ?>
<?php  include('session.php'); ?>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">
 <?php include('navbarmain.php'); ?>
  <div class="content-wrapper">
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container">
           <div class="row">
		
										<?php 
								$query_teacher = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
								$count_teacher = mysqli_num_rows($query_teacher);
								?>
								<?php 
								$query_act_teacher = mysqli_query($conn,"select * from teacher where teacher_stat ='Deactivated'")or die(mysqli_error());
								$count_act_teacher = mysqli_num_rows($query_act_teacher);
								?>
										<?php 
								$query_student = mysqli_query($conn,"select * from student")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
								
									<?php 
								$query_class = mysqli_query($conn,"select * from class")or die(mysqli_error());
								$count_class = mysqli_num_rows($query_class);
								?>
								
										<?php 
								$query_file = mysqli_query($conn,"select * from files")or die(mysqli_error());
								$count_file = mysqli_num_rows($query_file);
								?>
								
										<?php 
								$query_subject = mysqli_query($conn,"select * from subject")or die(mysqli_error());
								$count_subject = mysqli_num_rows($query_subject);
								?>
								<?php 
								$query_user = mysqli_query($conn,"select * from users")or die(mysqli_error());
								$count_user = mysqli_num_rows($query_user);
								?>
								<?php 
								$query_student = mysqli_query($conn,"select * from teacher where teacher_stat='Deactivated'")or die(mysqli_error());
								$count_deactivated = mysqli_num_rows($query_student);
								?>
								<?php 
								$query_student = mysqli_query($conn,"select * from teacher where teacher_stat='Activated'")or die(mysqli_error());
								$count_activated = mysqli_num_rows($query_student);
								?>
								<?php 
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC limit 1")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
        
          <!-- ./col -->

		   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count_class; ?></h3>

                <p>Class</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-list"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $count_subject; ?></h3>

                <p>Subjects</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paper"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success ">
              <div class="inner">
                <h3><?php echo $count_file; ?></h3>

                <p>Downloadable Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-download"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> <div class="col-lg-3 col-6">
            <div class="small-box bg-primary ">
              <div class="inner">
                <h3><?php echo $count_user; ?></h3>

                <p>Admin Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-primary ">
              <div class="inner">
                <h3><?php echo $count_student; ?></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  
		   <div class="col-md-12">
            <div class="card shadow-lg">
              <div class="card-header">
                <h5 class="card-title">Class Status</h5>
				
              </div>
			  
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Number of Student per class:S.Y.&nbsp<?php echo $school_year; ?></strong>
                    </p>
					<div>
					  <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
					</div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-6 col-6">
                    <div class="description-block border-right">
                       <div id="piechart"></div>
                    </div>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>			 
      </div>
    </section>
  </div>
  <?php include('footer.php'); ?>
</div>

 <?php 
 $query3= mysqli_query($conn,"SELECT concat(class_name,' ', subject_title,' - ',teacher.lastname) 
	as subject, count(*) as count FROM teacher_class_student 
	LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
    LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id
    INNER JOIN subject ON subject.subject_id = teacher_class.subject_id 
    INNER JOIN class ON class.class_id = teacher_class.class_id 
    LEFT JOIN school_year on school_year.school_year = teacher_class.school_year
    LEFT JOIN teacher on teacher.teacher_id = teacher_class.teacher_id
    where teacher_class.school_year = '$school_year' group by teacher_class.teacher_class_id")or die(mysqli_error());
						$row = mysqli_fetch_array($query);
						foreach($query3 as $data)
						{
							$subject[] = $data['subject'];
							$count[] = $data['count'];
							}
							?>
<?php include('script.php'); ?>
</body>
</html>
