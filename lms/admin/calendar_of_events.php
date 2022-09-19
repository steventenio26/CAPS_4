<?php include('header.php'); ?>
<?php include('calendar.php'); ?>
<?php  include('session.php'); ?>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
<?php include('navbarmain.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">    
        </div>
    </section>
    <section class="content">
      <div class="container-fluid">
	    <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-calendar"></i>
                  Event Calendar
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-4">
                    <h4>Add Event</h4>
              <form method="post">
			  <div class="form-group">
                   
                    <input type="date" name="date_start" class="form-control" placeholder="Date Start.."required>
                  </div>
                  <div class="form-group">
                    
                    <input type="date" name="date_end" class="form-control" placeholder="Date End"required>
                  </div>
                  <div class="form-group">
                    
                    <textarea name="title" class="form-control"  placeholder="Event Title" required></textarea>
					 <button name="add" class="btn btn-primary btn-block mt-2"><i class="fas fa-plus"></i>Add Event</button>
                  </div>
              </form>
								  <?php
					if (isset($_POST['add'])){
						$date_start = $_POST['date_start'];
						$date_end = $_POST['date_end'];
						$title = $_POST['title'];
						$query = mysqli_query($conn,"insert into event (date_end,date_start,event_title, user) values('$date_end','$date_start','$title','$user_username')")or die(mysqli_error());
						?>
						<script>
						window.location = "calendar_of_events1.php";
						</script>
					<?php
					}
					?>
			  <hr>
                  </div>
                  <div class="col-12 col-md-8">
                   <h4>Calendar</h4>
                    <div class="card card-primary">
              <div class="card-body p-0">
                <div id='calendar'></div>
              </div>
            </div>
                  </div>
				  <div class="col-12 col-md-12">
				    <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                     <th>Event Title</th>
                    <th>Date</th>					
					<th>No. of day(s)</th>	
					<th>Created by</th>
					<th></th>
                    </tr>
                  </thead>
                  <tbody>
				  		  <?php $event_query = mysqli_query($conn,"SELECT event_id, event_title,user, monthname(date_start), day(date_start), year(date_start), dayname(date_start), monthname(date_end), day(date_end), year(date_end), dayname(date_end),  user, DATEDIFF(date_end, date_start) as event_days from event where teacher_class_id = ''")or die(mysqli_error());
										while($event_row = mysqli_fetch_array($event_query)){
										$id  = $event_row['event_id'];
									?>      		
									
										<tr id="del<?php echo $id; ?>">
									
										 <td><?php echo $event_row['event_title']; ?> </td>
                                         <td><strong><?php  echo $event_row['monthname(date_start)']; ?>
										 <?php  echo $event_row['day(date_start)']; ?>,
										 <?php  echo $event_row['year(date_start)']; ?>-
										  <?php  echo $event_row['dayname(date_start)']; ?>
											</strong>
											to
											<strong>
											<?php  echo $event_row['monthname(date_end)']; ?>
										 <?php  echo $event_row['day(date_end)']; ?>,
										 <?php  echo $event_row['year(date_end)']; ?>-
										  <?php  echo $event_row['dayname(date_end)']; ?>
											</strong> 
										 </td>  
								
										 <td> <strong><?php echo $event_row['event_days']; ?> </strong></td>
										  <td><?php echo $event_row['user']; ?> </td>
										  
                      <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">  
							 <a  class="btn btn-danger" href="delete_event.php<?php echo '?id='.$id; ?>"><i class="fas fa-trash"></i></a>
                        
                      </div>
                    </td>
                  </tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
				  </div>
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
 <?php include('footer1.php'); ?>
</div>
<?php include('script.php'); ?>
<?php include('admin_calendar_script.php'); ?>
</body>
</html>
