$(document).ready(function(){
    // Delete 
    $('.delete_notif').click(function(){
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
                url: 'delete_notif.php',
                type: 'POST',
                data: { id:id },
                success: function(response){
                    if(response == 1){
                        // Remove row from HTML Table
                        $(el).closest('div').css('background','tomato');
                        $(el).closest('div').fadeOut(800,function(){
                            $(this).remove();
                        });
						
					}
					
                  }
				  
			  });
			
		   }
	   })   
    });
});














