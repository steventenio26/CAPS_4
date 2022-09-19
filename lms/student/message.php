
	<?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="offcanvas.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
  <style>
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
<body >
<?php include('navbar_student.php'); ?>

<main class="container">

	
  <?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_assoc($query);
									$fullname = ucwords($row['firstname'].' '.$row['lastname']);										
?>
<?php 
        $msg="active";
        if (isset($_POST['send'])) {
          $my_message = $_POST['send'];
          $sender = $_GET['sender_id'];
          if (!empty($_POST['send']) && !empty($sender)) {
            $sql2 = mysqli_query($conn,"SELECT * FROM student WHERE student_id = '$sender'");
            $row2 = mysqli_fetch_array($sql2);
            $name1 = $row2['firstname'].' '.$row2['lastname'];
            mysqli_query($conn,"INSERT INTO message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) VALUES('$sender','$my_message',NOW(),'$session_id','$name1','$fullname')");;            
          }
        }
        if (isset($_POST['search'])) {
          $search = $_POST['search'];
          $query = mysqli_query($conn, "SELECT * FROM student WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' ");         
        }else{
          $query = mysqli_query($conn,"SELECT * FROM student");
        }
        ?>
<div class="row mt-1">
         <div class="col-md-12">
           <div class="my-3 p-3 rounded card shadow-lg  mb-3 ">						
              
               <div class="row">
                  <div class="col-md-4 ">
                        <form action="" method="post">
                          <input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off"> 
                        </form>                        
                    
					  <div style="height:440px;overflow-y:scroll; overflow:auto">
				   <?php
                 
                          if(mysqli_num_rows($query) > 0){                        
                          while($row = mysqli_fetch_array($query)){
                            $sender_id = $row['student_id'];
                            $query1 = mysqli_query($conn,"SELECT * FROM message WHERE (sender_id = '$sender_id' AND reciever_id = '$session_id') OR (sender_id = '$session_id' AND reciever_id = '$sender_id') ORDER BY date_sended DESC LIMIT 1");
                            $row1 = mysqli_fetch_array($query1);
                            $msg = $row1['content'];
						?>
                    <a href="?<?php echo 'sender_id='.$sender_id; ?>" style="text-decoration:none;"><div class="d-flex text-muted pt-3">
      <img src="../admin/<?php echo $row['location']; ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle" width="50" height="50">

					  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
						<div class="d-flex justify-content-between">
						  <strong class="text-dark h6"><?php echo $row['firstname'].' '.$row['lastname'];?></strong>
						</div>
						<span class="d-block">
							<?php 
                                if(strlen($msg) > 28){
                                  $content = substr($msg,0 ,28).'...';
                                }else{
                                  $content = $msg;
                                }
                                if ($row1['sender_id'] == $session_id) {
                                  $you = "You: ";
                                }else{
                                  $you = "";
                                }
                                if(!empty($content)){ ?>
                                  <?php echo $you.$content; ?>
                                <?php }else{ ?>
                              No current message...
                                <?php } ?> 
						
						</span>
					  </div>
					</div> </a>
					    <?php } } else{ ?>
                          <div class="alert alert-primary text-center mx-2 mt-2">
                            <p class="h6">Student not found</p>
                          </div>
                      <?php  } ?>
                  </div></div>  
                  <div class="col-md-8">
				  <div style="height:380px;overflow-y:scroll; overflow:auto">
				   <?php
                      $sender = $_GET['sender_id'];
                      $sql = mysqli_query($conn,"SELECT * FROM message WHERE (sender_id = '$sender' AND reciever_id = '$session_id') OR (sender_id = '$session_id' AND reciever_id = '$sender') ORDER BY date_sended ASC");
                      if(mysqli_num_rows($sql) > 0){
                      while ($row = mysqli_fetch_array($sql)) {
                        $sql1 = mysqli_query($conn,"SELECT * FROM student WHERE student_id = '$sender'");
                        $row1 = mysqli_fetch_array($sql1);
                        if($row['sender_id'] == $session_id){ ?>
                          <!-- Reciever Message-->
						 <div class="card w-50 bg-secondary text-white  mb-2" style="margin-left:350px;">
						  <div class="card-body">
						  
							<p class="card-text fw-bold"><?php echo $row['content']; ?></p>
							 <p class="small text-white">
                         <time class ="timeago" datetime="<?php echo $row['date_sended']; ?>"></time></p>
						  </div>
						 
						</div>
					
					
                      <?php }else{ ?>
					   <div class="card w-50 mb-2">
					   <div class="card-body">
                              
      <img src="../admin/<?php echo $row1['location']; ?>" alt="user" width="50" height="50" class="rounded-circle">

					 	<p class="card-text fw-bold"><?php echo $row['content']; ?></p>
						<p class="small text-muted"><span data-feather="clock"></span>
                         <time class ="timeago" datetime="<?php echo $row['date_sended']; ?>"></time></p>
						</div></div>
						 
						
                         
                      <?php }} ?>
                      <?php }else{ ?>
                        <div class="alert alert-primary text-center">
                          <p class="h6">No current message</p>
                        </div>
                        <?php }
                      ?>
				 
				  </div>
				   <form action="" method="POST" class="bg-light">
                   
					    <div class="input-group mb-0"style="height: 4rem;">
                     
                        <input type="text" name="send" class="form-control" placeholder="Enter text here...">   
					<button id="button-addon2" class="btn btn-primary">Send</button>						
                    </div>
                    </form>	
            </div>
          </div>
        </div> 
	</div>
</main>
</body>
<script src="switch.js"></script>

<script src="offcanvas.js"></script>

</html>



	
