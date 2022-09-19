<div class="modal fade" id="teacher">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select file(.xls, .csv, .xlsx)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="excel_teacher.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="import_file" />
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button name="save_excel_teacher"  class="btn btn-success">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>