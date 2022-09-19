<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <img id="avatar" class="img-thumbnail rounded mx-auto mb-5 d-block" src="../admin/<?php echo $row['location']; ?>">
              <li class="nav-item">
                <a class="nav-link <?php echo $class;?>" href="dashboard_teacher.php">
                  <span data-feather="home"></span>
                  My Class
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $notif;?>" href="notification_teacher.php">
                  <i data-feather="bell"></i>
                  Notification
                  <span class="badge badge-danger float-right" id="notif"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $msg;?>" href="teacher_message.php?sender_id=">
                  <i data-feather="message-circle"></i>
                  Message                                    
                </a>
              </li>
              <?php 
              if ($dep_count < 1){
              ?>            
              <li class="nav-item">
                <a class="nav-link <?php echo $exam;?>" href="teacher_quiz.php">
                  <span data-feather="book"></span>
                  Quiz
                </a>
              </li>
              <?php } 
              if ($dep_count < 1){
              ?>
              <li class="nav-item">
                <a class="nav-link <?php echo $exam_teacher;?>" href="teacher_exam.php">
                  <span data-feather="book"></span>
                  Exam
                </a>
              </li>
              <?php
              } 
              if ($dep_count < 1){
              ?>
              <li class="nav-item">
                <a class="nav-link <?php echo $archive;?>" href="teacher_archive.php">
                  <span data-feather="archive"></span>
                  Archived Classes
                </a>
              </li>
              <?php } ?>
            </ul>
        </nav>