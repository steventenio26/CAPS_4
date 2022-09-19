	<?php include('dbcon.php'); ?>
	<?php include('../session.php'); ?>
	<?php include('count.php'); ?>
	<?php if($not_read == '0'){
			}else{ ?>
	<span class="position-absolute top-1 start-10 translate-middle badge rounded-pill bg-danger">
   <?php echo $not_read; ?> 
  </span><?php } ?> 