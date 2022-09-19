$(document).ready(function(){
    // Delete 
    $('.delete').click(function(){
        var el = this;
        // Delete id
        var id = $(this).data('id');     
            // AJAX Request
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
				 $.ajax({
                url: 'delete_save_file.php',
                type: 'POST',
                data: { id:id },
                success: function(response){
                    if(response == 1){
                        // Remove row from HTML Table
                        $(el).closest('tr').css('background','tomato');
                        $(el).closest('tr').fadeOut(800,function(){
                            $(this).remove();
                        });
						
					}
					
                  }
				  
			  });

				const Toast = Swal.mixin({
				  toast: true,
				  position: 'top-end',
				  showConfirmButton: false,
				  timer: 1200,
				  timerProgressBar: true,
				  didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				  }
				})

				Toast.fire({
				  icon: 'success',
				  title: 'File deleted successfully'
				})
		   }
	   })   
    });
});














