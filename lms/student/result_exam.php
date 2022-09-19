<?php include('bootstrapandjquery.php');
include('../session.php'); 
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));	
$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
					$school_year_query_row = mysqli_fetch_array($school_year_query);
					$school_year = $school_year_query_row['school_year'];
				 $query_session = mysqli_query($conn,"select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'")or die(mysqli_error());
														$row = mysqli_fetch_array($query_session);
														$id = $row['teacher_class_id'];	   
				$correct=0;
				$wrong=0;
				if(isset($_SESSION["answer"]))
				{
					for($i=1;$i<=sizeof($_SESSION["answer"]);$i++)
					{
						$answer="";
						$res=mysqli_query($conn, "SELECT * FROM exam_questions where exam_id='$_SESSION[exam_category]' && question_no=$i");
						while($row=mysqli_fetch_array($res))
						{
							$answer=$row["answer"];
							$question=$row["question_id"];
							$selected_answer =$_SESSION["answer"][$i];
							$points = $row['points'] + 1;


					
							mysqli_query($conn,"insert into student_answer_exam(id, student_id, question_no, question_id, exam_id, selected_answer,correct_answer)VALUES(NULL,'$session_id',$i,'$question','$_SESSION[exam_category]', '$selected_answer','$answer')") or die(mysqli_error());								
						
						
						}
						
						if(isset($_SESSION["answer"][$i]))
						{
							if($answer==$_SESSION["answer"][$i])
							{
								$correct=$correct+1;
								mysqli_query($conn,"UPDATE exam_questions SET points = '$points' WHERE question_no = $i");
							}else{
								$wrong=$wrong+1;
							}
						}
						else{
							$wrong=$wrong+1;
						}
					}
					
						
				}
			
				$count=0;
				$res=mysqli_query($conn, "SELECT * FROM exam_questions where exam_id ='$_SESSION[exam_category]'");
				$count=mysqli_num_rows($res);
				$wrong=$count-$correct;		
				
						
				
				if(isset($_SESSION["exam_start"]))	
				{
					$date=date("Y-m-d");
					mysqli_query($conn,"insert into exam_results(id, student_id,exam_id,total_question,correct_answer,wrong_answer,time)VALUES(NULL,'$session_id','$_SESSION[exam_category]','$count','$correct','$wrong','$date')") or die(mysqli_error());		
					
			}
						if(isset($_SESSION["exam_start"]))
						{
							unset($_SESSION["exam_start"])
						
							?>
							<script type="text/javascript">
							window.location='select_exam.php<?php echo '?id='.$id; ?>';
							</script>
							<?php
						}
					
				?>
					
   
	  