  <?php include('header.php'); ?>
		<body><!-- Start: Login Signup in Modal -->
		<div class="container-fluid">
		<?php include('landingpage_navbar.php'); ?>
        <?php include('landingpage_login.php'); ?>
        </div>
 <section class="article-list" style="background: linear-gradient(white, rgba(0,123,255,0.5) 24%);">
                        <div class="container" style="background: linear-gradient(rgba(0,123,255,0.5) 0%, white);border-radius: 10px;font-family: Itim, serif;">
                            <!-- Start: Intro -->
                            <div class="intro">
                                <h2 class="text-center">About Us</h2>
								<?php
											$query = mysqli_query($conn,"select * from content where title  = 'About' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
											$about = $row['content'];
										?>
                                <p class="text-center" style="color: var(--bs-dark);font-size:20px;"><?php echo $about; ?>&nbsp;</p>
                            </div>
                            <!-- End: Intro -->
                            <!-- Start: Articles -->
                            <div class="row articles">
                                <div class="col-sm-6 col-md-4 item">
                                   <?php
											$query = mysqli_query($conn,"select * from content where title  = 'History' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
											$history = $row['content'];
										?>
                                    <h3 class="name">History</h3>
                                    <p class="description" style="color: var(--bs-dark);font-size:20px;">
                                        <br><?php echo $history; ?>
                                        <br>
                                    </p>
                                    <a class="action" href="#">
                                        <i class="fa fa-arrow-circle-right">

                                        </i>
                                    </a>
                                </div>
										<?php
											$query = mysqli_query($conn,"select * from content where title  = 'Mission' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
											$mission = $row['content'];
										?>
                                <div class="col-sm-6 col-md-4 item">
                                   
                                    <h3 class="name">Mission</h3>
                                    <p class="description" style="color: var(--bs-dark); font-size:20px;"><?php echo $mission; ?>&nbsp;<br>
                                    </p>
                                    <a class="action" href="#">
                                        <i class="fa fa-arrow-circle-right">

                                        </i>
                                    </a>
                                </div>
								<?php
											$query = mysqli_query($conn,"select * from content where title  = 'Vision' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
											$vision = $row['content'];
										?>
                                <div class="col-sm-6 col-md-4 item">
                                  
                                    <h3 class="name">Vision</h3>
                                    <p class="description" style="color: var(--bs-dark);font-size:20px;">
                                        <br><?php echo $vision; ?>
                                        <br>
                                    </p>
                                    <a class="action" href="#">
                                        <i class="fa fa-arrow-circle-right">

                                        </i>
                                    </a>
                                </div>
                            </div>
                            <!-- End: Articles -->
                        </div>
                    </section>
					 <?php include('landingpage_footer.php'); ?>
                    <!-- End: Footer with social media icons -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
                    </script>
                    <script src="assets/js/script.min.js">
                    </script>