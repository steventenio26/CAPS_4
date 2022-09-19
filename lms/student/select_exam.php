<?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <style>
	#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
  
  
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
  
  
}



.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 0px
}

.invoice table td,.invoice table th {
    padding: 15px;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: bold;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
  
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: left;
    font-size: 1.2em
}

.invoice table .no {
   
    font-size: 1.6em;
 
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {


    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

	</style>
</head>
<body >
 <?php include('navbar_student.php'); ?>
 <?php include('link.php'); ?>
<main class="container">

<?php
				$query_exam_list = mysqli_query($conn,"select * from class_exam where teacher_class_id = '$get_id'")or die(mysqli_error());
				$count_exam = mysqli_num_rows($query_exam_list);
				if ($count_exam > 0){
				?>
    <div class="invoice overflow-auto mt-2 shadow-lg">
        <div style="min-width: 600px">        
            <main> 
				
                 <table border="0" cellspacing="0" cellpadding="0" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-left">EXAM TITLE AND DESCRIPTION</th>
                            <th class="text-right">TIME</th>
                             <th class="text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$i=1;
						$res=mysqli_query($conn, "select * FROM class_exam LEFT JOIN exam on class_exam.exam_id = exam.exam_id where teacher_class_id = '$get_id'");
						while($row=mysqli_fetch_array($res)){
						$exam_id = $row['exam_id'];
						$query = mysqli_query($conn,"select * from exam_results where exam_id = '$exam_id' and student_id = '$session_id'")or die(mysqli_error());
						$count = mysqli_num_rows($query);				
						$init = $row['exam_time'];;
						$hours = floor($init / 3600);
						$minutes = floor(($init / 60) % 60);
						?>
                        <tr class="border-bottom">
                            <td class="no" style="width:25px;">
							<?php
								echo $i;
								$i++;
							?>
							</td>
                            <td class="text-left"><h3><strong><?php echo $row['exam_title']; ?></strong></h3><?php  echo $row['exam_description']; ?></td>
                            <td class="unit fw-bolder"style="width:240px;"><?php echo "$hours hr and $minutes mins"; ?></td>
							<td style="width:200px;">
							<center>
							<?php if ($count < 1){?> 
							<input type="image" src="../../dist/img/start.svg" class="btntake" value="<?php echo $exam_id;?>" onclick="set_exam_type_session(this.value);" style="width:140px; height:;">
							</center><?php }else{ ?><center><h6 class="text-success fw-bolder">Already taken&nbsp
							<i class="fas fa-check-circle"></i></h6>
							<?php
							$res1=mysqli_query($conn, "select * from exam_results where exam_id = '$exam_id' and student_id = '$session_id'");
							while($row1=mysqli_fetch_array($res1))
							{
							?>
							<h5 class="text-danger fw-bolder"><span class="badge bg-danger">score:&nbsp<?php echo $row1['correct_answer']; ?>
							
							/&nbsp<?php echo $row1['total_question']; ?>
							</span></h5>
							
							<a href="exam_result.php<?php echo '?id='.$exam_id; ?>&<?php echo '?session_id='.$session_id; ?>" class="btn btn-primary ">view result</a> 
							</center>
							
							<?php } ?>
							<?php } ?>
							
							</td>
						</tr>
						<?php
						}
						?>
                    </tbody>
                </table>
				
            </main>
        </div>
        <div>
	</div>  
</div>
	<?php }else{ ?>
				<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
				  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
				  </symbol>
				  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
				  </symbol>
				  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
				  </symbol>
				</svg>	
				<div class="alert alert-primary d-flex justify-content-center mt-2" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
				  <div>
				   No exam posted yet.
				  </div>
				</div>
	<?php } ?>	

</main>
</body>
	   <script src="switch.js"></script>
	   <script src="offcanvas.js"></script>
	 <?php include('timeago.php'); ?>
</html>

<script type="text/javascript">
    function set_exam_type_session(exam_category)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					$('.btntake').on('click', function(e){
					e.preventDefault();
					const href = $(this).attr('href')			
					Swal.fire({
					  title: 'Are you sure?',
					  text: "Are you sure you want to take this exam?",
					  icon: 'question',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, I will take this exam'
					}).then((result) => {
							if (result.value) {
							 window.location="dashboard_exam.php";
						}
					})
				}) 
            }
        };
        xmlhttp.open("GET","set_exam_type_session.php?exam_category="+ exam_category,true);
        xmlhttp.send(null);  
        }
</script>


   
   

   
   
   


   
   


