<!-- Modal add class -->
<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle"><span data-feather="lock"></span>
          Change Password</h6>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Current Password</label>
            <input type="password" class="form-control" name="cpass">
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="npass">
          </div>
          <div class="form-group">
            <label>Re-type Password</label>
            <input type="password" class="form-control" name="rpass">
            <input type="hidden" name="password" value="<?php echo $row1['password'];?>">
          </div>                        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light text-secondary" data-dismiss="modal">Cancel</button>
          <button name="change" class="btn btn-outline-light text-success"><span data-feather="check"></span>
          Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal -->

<!-- Modal add class -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalTitle"><span data-feather="user"></span>
          Profile</h6>
        </div>
        <div class="modal-body">
          <div class="mb-4 text-center">
            <img id="avatar" class="img-thumbnail rounded mx-auto d-block" onclick="triggerClick()" src="../admin/<?php echo $row['location']; ?>">
            <small class="text-secondary">click your picture to change profile</small>
            <input type="file" class="d-none" id="profileImage" name="profileImage" onchange="displayImage(this)">
          </div>          
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>" autocomplete="off">                     
          </div>
          <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo ucwords($row['firstname']);?>" autocomplete="off">                
          </div>
          <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo ucwords($row['lastname']);?>" autocomplete="off">                
            <input type="hidden" name="password" value="<?php echo $row1['password'];?>">      
          </div>                  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light text-secondary" data-dismiss="modal">Cancel</button>
          <button name="profile-save" class="btn btn-outline-light text-success"><span data-feather="check"></span>
          Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal -->