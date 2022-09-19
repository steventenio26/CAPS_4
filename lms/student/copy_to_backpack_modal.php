<div class="modal fade" id="copyModal">
  <div class="modal-dialog modal-md ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Save File</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
		<div class="modal-body">
			<p>Are you sure you want to save this file?</p>
 		<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
		</div>
      <div class="modal-footer">
        <button name="copy_file" type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
			