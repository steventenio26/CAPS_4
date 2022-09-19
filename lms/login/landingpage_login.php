<div class="modal fade" role="dialog" tabindex="-1" id="signup">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Sign In</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                       <form id="login_form1" method="post">
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="text-primary input-group-text">
                                        <i class="fa fa-envelope-o">

                                        </i>
                                    </span>
                                    <input class="form-control" type="text" id="username" name="username"  required="" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="text-primary input-group-text">
                                        <i class="fa fa-lock">

                                        </i></span>
                                        <input class="form-control" type="password" id="password" name="password" required="" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button id="signin" name="login" class="btn btn-primary btn-lg" style="width: 100%;" >Log in</button>
                                </div>
                            </form>
                            <hr style="background-color: #bababa;">
                            <p class="text-center">Or&nbsp;<a class="text-decoration-none" href="#">Forget password</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
			
			<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true')
									{
									Swal.fire(
										  'Success!',
										  'Welcome to Angels of Peace Academy LMS',
										  'success'
										)
									var delay = 1000;
										setTimeout(function(){ window.location = '../teacher/dashboard_teacher.php'  }, delay);  
									}else if (html == 'true_student'){
										const Toast = Swal.mixin({
									  toast: true,
									  position: 'top-end',
									  showConfirmButton: false,
									  timer: 3000,
									  timerProgressBar: true,
									  didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									  }
									})
									Toast.fire({
									  icon: 'success',
									  title: 'Hello Student! Welcome to Angels of Peace Academy LMS'
									})
									var delay = 3000;
										setTimeout(function(){ window.location = '../student/dashboard_student.php'  }, delay);  
									}else
									{
									Swal.fire(
										  'Logi Failed!',
										  'Please Check your username and Password!',
										  'error'
										)
									}
									}
								});
								return false;
							});
						});
						</script>
     