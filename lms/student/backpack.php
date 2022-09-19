

<style>
.card-1 {
    border: none;
    border-radius: 10px;
    width: 100%;
    background-color: #fff
}
</style>
				<div class="modal fade" id="myModal">
				  <div class="modal-dialog modal-lg modal-dialog-scrollable">
					<div class="modal-content bg-dark">
					  <div class="modal-header">
						<h4 class="modal-title">Save Files</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  </div>
					  <div class="modal-body">
					  <div class="container">
					  <?php
								$query_backpack = mysqli_query($conn,"select * FROM student_backpack where student_id = '$session_id'  order by fdatein DESC ")or die(mysqli_error());
								$num_row = mysqli_num_rows($query_backpack);
								if ($num_row > 0){
								?>									
		
				<table class="table table-borderless table-responsive card-1 p-4 bg-dark" style="font-size:17px;">
					<thead>
						<tr class="border-bottom text-muted">
							<th> <span class="ml-2">Date & Time Save</span> </th>
							<th> <span class="ml-2">Filename & Description</span> </th>
						   
							<th> <span class="ml-4">Action</span> </th>
						
						</tr>
					</thead>
					<tbody>
				 <?php
				
				$query = mysqli_query($conn,"select * FROM student_backpack  order by fdatein DESC ")or die(mysqli_error());
				while($row = mysqli_fetch_array($query)){
				$file_id  = $row['file_id'];
				?> 
            <tr class="border-bottom text-muted">
                <td>                 
					<div class="p-2"> <span class="d-block font-weight-bold "><?php echo date('M jS Y \a\t D g:ia', strtotime($row["fdatein"])); ?></span> 
					<span class="badge bg-info text-dark"><i class="far fa-clock"></i><time class ="timeago" datetime="<?php echo $row['fdatein']; ?>"></time></span>
                     </div> 					
                </td>
                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2">
                        <div class="d-flex flex-column ml-2"> <h5 class="d-block font-weight-bold text-muted"><?php  echo $row['fname']; ?></h5> <small class="text-muted"> <?php echo $row['fdesc']; ?></small> </div>
                    </div>
                </td>              
                <td style="width:15px;">
				 <div class="d-flex justify-content-center"> 
					<a title="Download" id="<?php echo $file_id; ?>download"  class="btn btn-info" href="<?php echo $row['floc']; ?>"><i class="fas fa-download"></i></a>
                   </div>
				   
                </td>
				 <td style="width:15px;">
				 <div class="d-flex justify-content-center"> 
					<button class='btn btn-warning delete' data-id='<?php echo $row['file_id']; ?>'><li class="fa fa-trash"></li></button>
                   </div>
				 </td>
            </tr>
			<?php } ?>
        </tbody>
    </table>
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
								<div class="alert alert-primary d-flex align-items-center mt-2" role="alert">
								  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
								  <div>
								 No files has been save yet.
								  </div>
								</div>
		<?php } ?>
</div>
</div>
    </div>
  </div>
</div>
 <script src='delete_save_file_script.js' type='text/javascript'></script>
 <script src="switch.js"></script>
<?php include('timeago.php'); ?>