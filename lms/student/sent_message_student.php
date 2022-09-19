    <?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

    <style>
div.ex1 {
  width:833px;
  height: 500px;
  overflow: auto;
  }

  </style>
</head>
<body class="hold-transition sidebar-collapse layout-fixed layout-top-nav layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
 <?php include('navbar_student.php'); ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 <?php include('breadcrumb.php'); ?>
    <!-- /.content-header -->
    <!-- Main content -->
   <section class="content">
      <div class="container">  
          <div class="row">		  
  		    <div class="col-12 col-md-12 col-lg-3 order-1 order-md-1">
            <!-- Widget: user widget style 2 -->
           		<?php include('sidebar_student_dashboard.php'); ?>
			</div>
            <!-- /.widget-user -->                
			    <div class="col-12 col-md-12 col-lg-9 order-2 order-md-1">
 	 <div class="row">
          <div class="col-7">
		  
				<?php include("remove_sent_message_modal1.php"); ?>
		     <div class="card direct-chat direct-chat-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Sent Messages</h3>

                <div class="card-tools">
                  <a href="student_message.php" class="btn btn-default btn-sm">
                    <i class="fas fa-envelope"></i>inbox
                  </a>
                  
                  <a href="sent_message_student.php" class="btn btn-primary btn-sm">
                      <i class="fas fa-comments"></i>sent messages
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
				
				
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
				   <?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
							?>
				  <?php
								 $query_announcement1 = mysqli_query($conn,"select * from message_sent
																	LEFT JOIN teacher ON teacher.teacher_id = message_sent.reciever_id
																	where sender_id = '$session_id'  order by date_sended DESC
																	")or die(mysqli_error());
								 $count_my_message1 = mysqli_num_rows($query_announcement1);
								 if ($count_my_message1 != '0'){
								 while($row1 = mysqli_fetch_array($query_announcement1)){
								 $id1 = $row1['message_sent_id'];
								 ?>
								 
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Me send to <?php echo $row1['reciever_name']; ?></span>
                      <span class="direct-chat-timestamp float-left"><?php echo $row1['date_sended']; ?>-<time class ="timeago" datetime="<?php echo $row1['date_sended']; ?>"></time></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="../admin/<?php echo $row['location']; ?>" alt="message user image">
                    <!-- /.direct-chat-img -->
                     <div class="direct-chat-text">
                    <?php echo $row1['content']; ?>
					
                    </div>
                    <!-- /.direct-chat-text --><a href="#" class="link-black text-sm " data-toggle="dropdown"><i class="fa fa-ellipsis-h mr-1"></i>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a  class="dropdown-item remove" id="<?php echo $id1; ?>">remove</a>
					 <?php include("remove_sent_message_modal.php"); ?>
                    </div> 
					</a>
                 </div>
				  <?php }}else{ ?>
								 <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> </h5>
                  No message in your sent items
                </div>
								<?php } ?>	
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
            
                  <!-- /.direct-chat-msg -->
	
                </div>
                <!--/.direct-chat-messages-->

            <script type="text/javascript">
	$(document).ready( function() {

		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_sent_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			alert("Your Sent message is Successfully Deleted");
		
			}
			}); 
			
			return false;
		});				
	});

</script>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="search message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">search</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
       
            <!-- /.card -->
          </div>
			   <div class="col-md-5">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-pen"></i>
                  Compose new message
                </h3>
				
              </div>
			                
              
                 
            <nav class="w-100 mt-2">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="teacher-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="teacher" aria-selected="true">Teacher</a>
                <a class="nav-item nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="false">Student</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
		<?php include('student_message_teacher.php'); ?>
			  </div>
              <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab"> 
			<?php include('student_message_student.php'); ?>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->
<?php include('timeago.php'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
</body>
</html>

   
   