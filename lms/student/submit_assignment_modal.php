<div class="modal fade" id="submit_assignment_Modal">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Submit Assignment</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
		<form id="add_assignment" method="post" enctype="multipart/form-data">
            <div class="modal-body">
				<div class="mb-3">
					<label for="formFile" class="form-label">Choose File</label>
					<input name="uploaded_file" class="form-control" type="file" id="formFile">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>"/>
				</div>	
				<div class="mb-3">
				  <label class="form-label">File Name</label>
				  <input type="text" name="name" class="form-control" >
				</div>
				<div class="mb-3">
				  <label class="form-label">File Description</label>
				  <input type="text" name="desc" class="form-control">
				</div>
            </div>
            <div class="modal-footer justify-content-between">      
              <button name="Upload" type="submit" class="btn btn-primary">Submit</button>
            </div>
		</form>
    </div>
  </div>
</div>				 
	<script>
			jQuery(document).ready(function($){
				$("#add_assignment").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "upload_assignment.php",
						data: formData,
						success: function(html){
						
							var delay = 1000;
										setTimeout(function(){ window.location = 'submit_assignment.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>'  }, delay);
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
	</script>	