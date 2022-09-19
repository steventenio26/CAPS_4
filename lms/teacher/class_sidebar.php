<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <img id="avatar" class="img-thumbnail rounded mx-auto mb-2 d-block" src="../admin/<?php echo $row['location']; ?>">
              <li class="nav-item">
                <a class="nav-link" href="dashboard_teacher.php">
                  <span data-feather="corner-up-left"></span>
                  Back
                </a>
              </li>              
              <li class="nav-item">
                <a class="nav-link <?php echo $students;?>" href="my_students.php?id=<?php echo $get_id.'&cid='.$class_id;?>">
                  <span data-feather="users"></span>
                  People
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $materials;?>" href="downloadable.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">
                  <span data-feather="download"></span>
                  Downloadable Materials
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $assign;?>" href="assignment.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">
                  <span data-feather="book-open"></span>
                  Assignment
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $announce;?>" href="announcements.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">
                  <span data-feather="bell"></span>
                  Announcement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $quiz;?>" href="class_quiz.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">
                  <span data-feather="book"></span>
                  Quiz
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $exam;?>" href="class_exam.php<?php echo '?id='.$get_id.'&cid='.$class_id; ?>">
                  <span data-feather="book"></span>
                  Exam
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $grade;?>" href="grade_students.php?id=<?php echo $get_id.'&cid='.$class_id;?>">
                  <span data-feather="star"></span>
                  Grade Book
                </a>
              </li>
            </ul>
          </div>
        </nav>