	   <form method="post" id="send_message">
                <div class="card-body">
                   <div class="form-group">
                   <label>To:</label>                
				   <select name="teacher_id" class="form-control select2" style="width: 100%;" required>
                                              	<option></option>
											<?php
											$query = mysqli_query($conn,"select * from teacher order by firstname");
											while($row = mysqli_fetch_array($query)){
											
											?>
											
											<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											
											<?php } ?>
                                            </select>
                  </div>
                  <div class="form-group">
                   <label>Type a message</label>
                        <textarea name="my_message" class="form-control" rows="3" placeholder="type ..." required></textarea>			
                  </div>
               
                </div>
                <!-- /.card-body -->

               <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success">Send</button>
                </div>
              </form>
			  <script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message_student.php",
						data: formData,
						success: function(html){
						
						alert("Message Successfully Sended");
						var delay = 2000;
							setTimeout(function(){ window.location = 'sent_message_student.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>