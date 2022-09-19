<?php include('header.php'); ?>
<?php  include('session.php'); ?>
<html lang="en">
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
  <?php include('navbarmain.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		 <div class="col-4">
		    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="firstname" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" name="lastname" class="form-control"  placeholder="">
                  </div>
				  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"  placeholder="">
                  </div> <div class="form-group">
                    <label>Password</label>
                    <input type="Password" name="password" class="form-control"  placeholder="">
                  </div>
                </div>
                <div class="card-footer">
                  <button name="save" class="btn btn-primary">Save</button>
                </div>
              </form>
							   <?php
				if (isset($_POST['save'])){
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$username = $_POST['username'];
				$password = $_POST['password'];


				$query = mysqli_query($conn,"select * from users where username = '$username' and password = '$password' and firstname = '$firstname' and password = '$password' ")or die(mysqli_error());
				$count = mysqli_num_rows($query);

				if ($count > 0){ ?>
				<script>
				alert('Data Already Exist');
				</script>
				<?php
				}else{
				mysqli_query($conn,"insert into users (username,password,firstname,lastname) values('$username','$password','$firstname','$lastname')")or die(mysqli_error());

				mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')")or die(mysqli_error());
				?>
				<script>
				window.location = "admin_user1.php";
				</script>
				<?php
				}
				}
				?>
            </div>
		 </div>
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
              </div>
              <div class="card-body">
			  <form action="delete_users.php" method="post">
                <table id="example1" class="table table-bordered table-striped">
				
				 <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-trash"></i>Delete User
                </button>
				<?php include('modal_delete_user.php'); ?>
				 
                  <thead>
                  <tr>
                   <th>Select</th>
					<th>Name</th>
					<th>Username</th>
					<th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
               <?php
					$user_query = mysqli_query($conn,"select * from users")or die(mysqli_error());
					while($row = mysqli_fetch_array($user_query)){
					$id = $row['user_id'];
				?>
					<tr>
					<td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td width="40"><a href="edit_user1.php<?php echo '?id='.$id; ?>"  class="btn btn-success"><i class="fas fa-edit"></i></a></td>
					</tr>
					<?php } ?>
                  </tbody>
                </table>
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include('footer1.php'); ?>
</div>
</body>
</html>
