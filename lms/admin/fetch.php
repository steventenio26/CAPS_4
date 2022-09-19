<?php include('dbcon.php');?>
               
  <?php
  
  if($_POST['request'])
  {
	  $request=$_POST['request'];
	<thead>
	<tr><th>Select</th>
	<th>Photo</th>
	<th>Name</th>
	<th>ID Number</th>
	<th>Grade & Section</th>
	<th>Email</th>
	<th>Status</th>
	<th>Password</th>
	<th>Edit</th></tr>
	</thead>
  <tbody>      
	  

<?php
$query = mysqli_query($conn,"select * from class WHERE class_name='$request'"); 
while ($row = mysqli_fetch_array($query)) {
$id = $row['student_id'];
$status = $row['status'];
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
<?php if ($status == 'Registered' ){ ?>
<td width="120"><span class="badge badge-success">Registered</span></td>
<?php }else{ ?>
<td width="120"><span class="badge badge-danger">Unregistered</span></td>
<?php } ?>
<?php if ($pass_stat == 'Default' ){ ?>
<td style='background-color:#f00; color:#fff;' width="100"><?php echo $row['password']; ?></td>
<?php }elseif ($pass_stat == 'Updated' ){ ?>
<td style='background-color:#fcba03;'><i class="fa fa-eye-slash" aria-hidden="true"></i>Password encrypted<h1 class="text-xs">(<i class="fa fa-lock" aria-hidden="true"></i>Updated by user)</h1></td>
<?php }elseif ($pass_stat == 'N/A' ){ ?>
<td style='background-color:#c7c5c1;'>No Password available<h1 class="text-xs">(not yet generated)</h1></td>								
<?php } ?>
<td width="30"><a href="edit_student1.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a></td>
</tr>
<?php } ?>    	

  };
  
  ?>
      