 <div class="container">
<div class="nav-scroller bg-body shadow-sm " style="border-radius:10px;" >
  <nav class="nav nav-underline" aria-label="Secondary navigation" >
   <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="my_classmates.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?>href="my_classmates.php<?php echo '?id='.$get_id; ?>"><img src="../../dist/img/classmate.png" class=" z-depth-2" width="30" height="30" >
      My Classmates    
    </a>
    <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="progress.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?>href="progress.php<?php echo '?id='.$get_id; ?>">
	<img src="../../dist/img/rising.png" class=" z-depth-2" width="30" height="30">
      My Progress
      </a>

	  <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="downloadable_student.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?>href="downloadable_student.php<?php echo '?id='.$get_id; ?>">
	  <img src="../../dist/img/direct-download.png" class=" z-depth-2" width="30" height="30" >
      Downloadable files
      </a>
	   <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="assignment_student.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?> href="assignment_student.php<?php echo '?id='.$get_id; ?>">
	   <img src="../../dist/img/assignment.png" class=" z-depth-2" width="30" height="30">         
        Assignments     
        </a>
	  <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="student_quiz_list.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?>href="student_quiz_list.php<?php echo '?id='.$get_id; ?>">
	  <img src="../../dist/img/quiz.png" class=" z-depth-2" width="30" height="30">
      Quiz
      </a>
	  <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="announcements_student.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?>href="announcements_student.php<?php echo '?id='.$get_id; ?>">
	  <img src="../../dist/img/megaphone.png" class=" z-depth-2" width="30" height="30">
      Announcements
      </a>
	  <a class="nav-link active" <?php echo (basename($_SERVER['PHP_SELF'])=="select_exam.php")?'style="color:white;background-color:rgb(104, 104, 104); border-radius:10px;"':""?>href="select_exam.php<?php echo '?id='.$get_id; ?>">
	  <img src="../../dist/img/calendar.png" class=" z-depth-2" width="30" height="30">
     Exam
      </a>
  </nav>
</div>
</div>