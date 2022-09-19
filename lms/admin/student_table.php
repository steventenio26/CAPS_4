<?php include('modal_import.php'); ?>
<?php include('modal_add_student.php'); ?>
 <div class="card">
            <div class="card-header">
            <h3 class="card-title"><i class="fa fa-users"></i>Students</h3>
            </div>
            <div class="card-body">
			<form action="delete_student.php" method="post">
			<button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#addstudent"><i class="fa fa-user-plus"></i>Add Students(Manual)</button>
				<button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#s"><i class="fas fa-file-excel"></i>Import Excel</button>
				
				<button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default"><i class="fa fa-trash"></i>Delete Student</button>
			
				<a href="generate.php" class="btn btn-warning mb-2 ml-2 float-right"><i class="fa fa-key"></i>Generate Password</a>
			
				<?php include('modal_delete_student.php'); ?>				
                <table id="example1" class="table table-bordered table-striped">
			
				</div id="table-container">	
                  <thead>
                  <tr><th></th>
				  <th>Photo</th>
				  <th>Name</th>
				  <th>ID Number</th>
				  <th>Grade & Section</th>
				  <th>Email</th>
				  <th>Password</th>
				  <th>Edit</th></tr>
                  </thead>
                <tbody>      
					

		<?php
	$query = mysqli_query($conn,"select * from student LEFT JOIN class ON student.class_id = class.class_id ORDER BY student.student_id DESC") or die(mysqli_error());
	while ($row = mysqli_fetch_array($query)) {
		$id = $row['student_id'];		
		$pass_stat = $row['pass_stat'];
		?>	
		<tr>
		<td width="30">
		<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
		</td>
	 <td width="40"><img class="img-circle" src="<?php echo $row['location']; ?>" height="50" width="50"></td>
		<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
		<td><?php echo $row['username']; ?></td> 	
		<td width="100"><?php echo $row['class_name']; ?></td> 
		<td width="100"><?php echo $row['email']; ?></td> 

		<?php if ($pass_stat == 'Default' ){ ?>
		<td style='background-color:#f00; color:#fff;' width="100"><?php echo $row['password']; ?></td>
		<?php }elseif ($pass_stat == 'Updated' ){ ?>
		<td style='background-color:#fcba03;'><i class="fa fa-eye-slash" aria-hidden="true"></i>Password encrypted<h1 class="text-xs">(<i class="fa fa-lock" aria-hidden="true"></i>Updated by user)</h1></td>
		<?php }elseif ($pass_stat == 'N/A' ){ ?>
		<td style='background-color:#c7c5c1;'>No Password available<h1 class="text-xs">(not yet generated)</h1></td>								
		<?php } ?>
		<td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a></td>
		</tr>
		<?php } ?>    	
         </tbody>               
        </table>
		</form>
     </div>            
 </div>
 <script src="jquery.js"></script>
					<script>
						$(document).ready(function()
						$("fetchval").on('change',function()

						var value = $(this).val();
						$.ajax(
							{
								url:'fetch.php',
								type:'POST',
								data:'request=' + value,
								beforeSend:function()
								{
									$("#table-container").html('Working on...');
								},
								success:function(data)
								{
									$("#table-container").html(data);
								},
							});
						});
						});