<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php include('navbar_teacher.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        $msg="active";
        include "teacher_sidebar.php"; 
        
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
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item active" aria-current="page">Messages</li>
                </ol>
              </nav>
            </div>
            <div class="bootstrap_chat">
              <div class="container py-5 px-4">
                <div class="row rounded-lg overflow-hidden shadow">
                  <div class="col-5 px-0">
                    <div class="bg-white">
                      <div class="bg-light px-4 py-2">
                        <p class="h5 mb-0 py-1">Students</p>
                        <form action="" method="post">
                          <input type="text" name="search" class="form-control" placeholder="Search..." autocomplete="off"> 
                        </form>                        
                      </div>
                      <div class="messages-box">
                        <div class="list-group rounded-0">
                        <?php
                          include "function_timeago.php";
                          if(mysqli_num_rows($query) > 0){                        
                          while($row = mysqli_fetch_array($query)){
                            $sender_id = $row['student_id'];
                            $query1 = mysqli_query($conn,"SELECT * FROM message WHERE (sender_id = '$sender_id' AND reciever_id = '$session_id') OR (sender_id = '$session_id' AND reciever_id = '$sender_id') ORDER BY date_sended DESC LIMIT 1");
                            $row1 = mysqli_fetch_array($query1);
                            $msg = $row1['content'];
											
											  ?>
                          <a href="?<?php echo 'sender_id='.$sender_id; ?>" class="list-group-item list-group-item-action rounded-0">
                            <div class="media"><img src="../admin/<?php echo $row['location']; ?>" alt="user" width="50" height="50" class="rounded-circle">
                              <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <h6 class="mb-0"><?php echo $row['firstname'].' '.$row['lastname'];?></h6>
                                </div>
                                
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
                                  <p class="font-italic text-muted mb-0 text-small"><?php echo $you.$content; ?></p>
                                <?php }else{ ?>
                                  <p class="font-italic text-muted mb-0 text-small">No current message...</p>
                                <?php } ?>                                
                              </div>
                            </div>
                          </a>
                        <?php } } else{ ?>
                          <div class="alert alert-primary text-center mx-2 mt-2">
                            <p class="h6">Student not found</p>
                          </div>
                      <?php  } ?>  
                        </div>
                      </div>                      
                    </div>
                  </div>              
                  <!-- Chat Box-->
                  <div class="col-7 px-0">
                    <div class="px-4 pt-5 pb-1 chat-box bg-white" id="chat-box">
                      <?php
                      $sender = $_GET['sender_id'];
                      $sql = mysqli_query($conn,"SELECT * FROM message WHERE (sender_id = '$sender' AND reciever_id = '$session_id') OR (sender_id = '$session_id' AND reciever_id = '$sender') ORDER BY date_sended ASC");
                      if(mysqli_num_rows($sql) > 0){
                      while ($row = mysqli_fetch_array($sql)) {
                        $sql1 = mysqli_query($conn,"SELECT * FROM student WHERE student_id = '$sender'");
                        $row1 = mysqli_fetch_array($sql1);
                        if($row['sender_id'] == $session_id){ ?>
                          <!-- Reciever Message-->
                          <div class="media w-50 ml-auto">
                            <div class="media-body">
                              <div class="bg-dark rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white"><?php echo $row['content']; ?></p>
                              </div>
                              <p class="small text-muted"><span data-feather="clock"></span>
                              <?php echo time_ago($row['date_sended']); ?></p>
                            </div>
                          </div>
                      <?php }else{ ?>
                          <!-- Sender Message-->
                          <div class="media w-50 mb-3"><img src="../admin/<?php echo $row1['location']; ?>" alt="user" width="35" height="35" class="rounded-circle">
                            <div class="media-body ml-3">
                              <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted"><?php echo $row['content']; ?></p>
                              </div>
                              <p class="small text-muted"><span data-feather="clock"></span>
                                <?php echo time_ago($row['date_sended']); ?></p>
                            </div>
                          </div>   
                      <?php }
                      } ?>
                      <?php }else{ ?>
                        <div class="alert alert-primary text-center">
                          <p class="h6">No current message</p>
                        </div>
                        <?php }
                      ?>                                         
                  </div>
                    
                    <!-- Typing area -->
                    <form action="" method="POST" class="bg-light">
                      <div class="input-group">
                        <input type="text" name="send" placeholder="Aa" aria-describedby="button-addon2" class="form-control rounded-0 mb-1 ml-1 py-4 bg-light" autocomplete="off">
                        <div class="input-group-append">
                          <button id="button-addon2" class="btn btn-link"> <i class="fa fa-paper-plane text-dark"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>            
        </main>
      </div>
    </div>
        <?php include "footer.php";?>