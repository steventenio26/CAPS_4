<!-- Modal add quiz-->
<div class="modal fade" id="addquiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6" id="exampleModalLongTitle"><span data-feather="slack"></span> 
                Add Quiz</h5>                
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quiz Title: </label>
                        <input type="text" class="form-control" name="quiz_title" id="exampleInputEmail1" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quiz Description: </label>
                        <textarea type="text" class="form-control" name="description" rows="3" id="exampleInputPassword1" placeholder="..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-light text-secondary" data-dismiss="modal">Close</button>
                    <button name="save" class="btn btn-sm btn-outline-light text-success"><span data-feather="check"></span> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal -->
<!-- Modal add exam-->
<div class="modal fade" id="addexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6" id="exampleModalLongTitle"><span data-feather="slack"></span> 
                Add Exam</h5>                
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Exam Title: </label>
                        <input type="text" class="form-control" name="quiz_title" id="exampleInputEmail1" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Exam Description: </label>
                        <textarea type="text" class="form-control" name="description" rows="3" id="exampleInputPassword1" placeholder="..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-light text-secondary" data-dismiss="modal">Close</button>
                    <button name="save_exam" class="btn btn-sm btn-outline-light text-success"><span data-feather="check"></span> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal -->