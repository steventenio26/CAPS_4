
		<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
							Swal.fire(
						  'Change Password Failed!',
						  'Password does not match with your current password!',
						  'error'
						)	
						
						window.location("my_profile.php");
						}else if  (new_password != retype_password){
						Swal.fire(
						  'Change Password Failed!',
						  'Password does not match with your new password!',
						  'warning'
						)	
						window.location("my_profile.php");
						}else if ((password == current_password) && (new_password == retype_password)){
							
						Swal.fire({
						  title: 'Are you sure?',
						  text: "Change password",
						  icon: 'question',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yes, change it!'
						}).then((result) => {
						  if (result.isConfirmed) {
							var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password_student.php",
						data: formData,
						success: function(html){
						const Toast = Swal.mixin({
									  toast: true,
									  position: 'top-end',
									  showConfirmButton: false,
									  timer: 1500,
									  timerProgressBar: true,
									  didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									  }
									})
									Toast.fire({
									  icon: 'success',
									  title: 'Password saved successfully'
									})
						var delay = 1500;
						setTimeout(function(){ window.location = 'my_profile.php'  }, delay);  
						}	
					});
					  }
					})
					}
				});
			});
	
			</script>
			
			
			
			