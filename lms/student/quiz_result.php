 <?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
  <div class="container">

<div class="card">
<?php
$qq=mysqli_query($conn, "select * FROM quiz LEFT JOIN quiz_results on quiz.quiz_id = quiz_results.quiz_id
							  where quiz.quiz_id = '$get_id' and student_id='$session_id'");
							while ($row = mysqli_fetch_array($qq)) {
							$qt = $row['quiz_title'];	
							$tq = $row['total_question'];
							$ca = $row['correct_answer'];
							$wa = $row['wrong_answer'];
							}
?>
						  <div class="card-header"  style="font-size:18px; font-weight:bold;">
						  <div class="d-flex bd-highlight">
						  <div class="p-2 flex-grow-1 bd-highlight">Quiz title:&nbsp<?php echo $qt;?></div>
						  <div class="p-2 bd-highlight">No. of questions:&nbsp<?php echo $tq;?></div>
						  <div class="p-2 bd-highlight">Correct Answer:&nbsp<?php echo $ca;?></div>
						  <div class="p-2 bd-highlight">Wrong answer:&nbsp<?php echo $wa;?></div>
						  </div>
						  </div>
							<div class="card-body">
				<?php
							echo '<br /><ol style="font-size:20px;font-weight:bold;">';
							$q=mysqli_query($conn, "select * FROM student_answer LEFT JOIN quiz on student_answer.quiz_id = quiz.quiz_id 
							 LEFT JOIN Questions on questions.question_id = student_answer.question_id where student_answer.quiz_id = '$get_id' and student_id='$session_id'");
							while ($row = mysqli_fetch_array($q)) {
							$question = $row['question'];
							$question_no = $row['question_no'];
							$sans = $row['selected_answer'];
							$cans = $row['correct_answer'];
							if ($sans == $cans && $sans != "") {
								echo '<li><div class="alert alert-success" role="alert" style="border:2px solid darkgreen;border-radius:10px;">' . $question . ' <i class="fas fa-check" style="font-size:20px;color:green;"></i></div><br />';
								echo '<font style="font-size:15px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:15px;">' . $sans . '</font><br />';
								echo '<font style="font-size:15px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:15px;">' . $cans . '</font><br />';
							} 
							else if ($sans == "") {
								echo '<li><div style="font-size:16px;font-weight:bold;margin-top:10px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . '</div><br />';
								echo '<font style="font-size:15px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:15px;">' . $cans . '</font><br />';
							} 
							else {
								echo '<li><div class="alert alert-danger" role="alert" style="border:2px solid darkred;border-radius:10px;">' . $question . ' <i class="fas fa-remove" style="font-size:20px;color:red;"></i></div><br />';
								echo '<p style="font-size:15px;color:red">Your Answer:<mark style="font-size:15px;">' . $sans . '</mark></p>';
								echo '<p style="font-size:15px;color:darkgreen"><b>Correct Answer: </b><mark style="font-size:15px;">' . $cans . '</mark></p>';
								
							}
							 echo "<br /></li>";
							}
								echo '</ol>';
								
				?> 
</div>
</div>
</div>
	