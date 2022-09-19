<!-- Modal add class -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="upload"></span>
          Upload Files</h6>
        </div>
        <div class="modal-body">
          <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="file_upload" id="customFile">
              <label class="custom-file-label" for="customFile">No File Chosen...</label>              
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput1">File Name</label>
              <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="..." required>
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput2">Description</label>
              <textarea class="form-control" id="exampleFormControlInput2" name="description" rows="5" placeholder="..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button name="submit" class="btn btn-outline-success"><span data-feather="upload-cloud"></span>
          Upload</button>
        </div>
      </form>      
    </div>
  </div>
</div>
<!-- end of modal -->