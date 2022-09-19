<?php include('bootstrapandjquery.php'); ?>
<?php include('../session.php'); ?>
<?php 
include "navbar_action.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="offcanvas.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
  <style>
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
<style>
/* Style all input fields */

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
}
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 0px;
}
#message p {
  font-size: 15px;
}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}
.valid:before {
  position: relative;
   margin-left: 5px;
  content: "✔";
}
/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}
.invalid:before {
  position: relative;
  margin-left: 5px;
  content: "✖";
}
.bi-eye-slash {
	font-size:20px;
    cursor: pointer;
}	font-weight:bold;
</style>
<body >
<?php include('navbar_student.php'); ?>
<main class="container">
<?php include('breadcrumb.php'); ?>
<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									$row = mysqli_fetch_assoc($query);
							$password = $row['password'];		
							?>
	<div class="row mt-1">
         <div class="col-md-12">
           <div class="my-3 p-3 rounded card shadow-lg bg-dark mb-3 ">					
              <h4>Update Profile</h4>
                <div class="row">
                  <div class="col-md-4 ">
                   <form method="post" action="student_avatar.php" enctype="multipart/form-data" id="form1">
					<img id="preview" src="../admin/<?php echo $row['location']; ?>" class="rounded-circle z-depth-2 img-thumbnail mb-3 " width="160px" title=''/>
					<div class="custom-file mb-3">
					<input  name="image"  class="form-control custom-file-input" type="file" id="inputGroupFile01" required>
					</div>
					<button name="change" class="btn btn-success mb-2 float-start"><i class="fas fa-image"></i>Save Avatar</button>  
					</form>                     
                  </div>  
                  <div class="col-md-8">
				  <div class="row">
				  	  <div class="col-md-6">
				  <div class="form-floating mb-3">
					<input type="email" class="form-control" value = "<?php echo $row['email'];  ?>" id="floatingInput" disabled>
					<label for="floatingInput"  class="text-dark">Email address </label>
					</div>	</div>   <div class="col-md-6">
                  <div class="form-floating mb-3">
					<input type="text" class="form-control" value = "<?php echo $row['firstname']." ".$row['lastname'];  ?>" id="floatingInput" disabled>
					<label for="floatingInput" class="text-dark">Full Name</label>
					</div></div></div>   				
					  <form action="" method="post">
						<label >Current Password</label>
					<div class="input-group mb-3">
					<input type="password" name="cpass" class="form-control " >
					 <input type="hidden" name="password" value="<?php echo $password;?>">
					</div>	
					<label >New Password</label>
					<div class="input-group mb-3">
					<input type="password" id="new_password" name="npass" class="form-control " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
					<span class="input-group-text"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
					</div>			
					<div id="message" class="mb-1">
						<div class="card">
					  <div class="card-body">
					  <div class="row">
					 <h6> <mark>Password must contain the following:</mark></h6>
					  <div class="col-md-6">
						<p id="letter" class="invalid">&nbsp A <b>lowercase</b> letter</p>
						<p id="capital" class="invalid">&nbsp A <b>capital (uppercase)</b> letter</p>
						</div>
						<div class="col-md-6">
						<p id="number" class="invalid">&nbsp A <b>number</b></p>
						<p id="length" class="invalid">&nbsp Minimum <b>8 characters</b></p>
					  </div></div></div>     
					</div>
					</div>
					<div class="form-floating mb-3">
					<input type="password" id="retype_password"  name="rpass" class="form-control" id="floatingPassword" placeholder="Password">
					<label for="floatingPassword" class="text-dark">Confirm Password</label>
					</div>
				 <button name="change" class="btn btn-success mb-1 float-end"><i class="fas fa-key"></i>Save Password</button>
				 </form>			

                  </div>
               
              </div>
           
          </div>
        </div> </div>
</main>
<?php 
include "navbar_action.php";?>
</body>
<script src="switch.js"></script>
<script>
var myInput = document.getElementById("new_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
    const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#new_password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
</script>
 <?php
 include('save_pass_script.php');?>
	  <script>
// Code By Webdevtrick ( https://webdevtrick.com )
$("#inputGroupFile01").change(function(event) {  
  RecurFadeIn();
  readURL(this);    
});
$("#inputGroupFile01").on('click',function(event){
  RecurFadeIn();
});
function readURL(input) {    
  if (input.files && input.files[0]) {   
    var reader = new FileReader();
    var filename = $("#inputGroupFile01").val();
    filename = filename.substring(filename.lastIndexOf('\\')+1);
    reader.onload = function(e) {
      debugger;      
      $('#preview').attr('src', e.target.result);
      $('#preview').hide();
      $('#preview').fadeIn(500);      
      $('.custom-file-label').text(filename);             
    }
    reader.readAsDataURL(input.files[0]);    
  } 
  $(".alert").removeClass("loading").hide();
}
function RecurFadeIn(){ 
  console.log('ran');
  FadeInAlert("Wait for it...");  
}
function FadeInAlert(text){
  $(".alert").show();
  $(".alert").text(text).addClass("loading");  
}
</script>
<script src="offcanvas.js"></script>

</html>

