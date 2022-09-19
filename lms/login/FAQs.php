  <?php include('header.php'); ?>
		<body><!-- Start: Login Signup in Modal -->
		<div class="container-fluid">
		<?php include('landingpage_navbar.php'); ?>
        <?php include('landingpage_login.php'); ?>
        </div>
<section class="py-5 bg-light" style="background: linear-gradient(rgba(0,123,255,0.5), white);">
         
            <div class="container">
                <div class="row">
				
                    <div class="col-md-4">
					 <h3 class="text-center text-success" style="padding-top: 15px;padding-bottom: 15px;color: #1b6ce5!important;font-family: Itim, serif;font-weight: bold;">General FAQs</h3>
                        <div id="faqlist" class="accordion accordion-flush">
                            <!-- Start: accordion-item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-1" style="font-family: Itim, serif;">
                                        <br>
                                        <strong>I have forgotten my password, how can I reset my password?</strong>
                                        <br>
                                        <br>
                                    </button>
                                </h2>
                                <div id="content-accordion-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
            
                        </div>
                    </div>
					
                    <div class="col-md-4">
					 <h3 class="text-center text-success" style="padding-top: 15px;padding-bottom: 15px;color: #1b6ce5!important;font-family: Itim, serif;font-weight: bold;">Student FAQs</h3>
                        <div id="faqlist1" class="accordion accordion-flush">
                            <!-- Start: accordion-item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-2" style="font-family: Itim, serif;">
                                        <br>
                                        <strong>How many attempt that I can take the quiz?</strong>
                                        <br>
                                        <br>
                                    </button>
                                </h2>
                                <div id="content-accordion-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
            
                        </div>
                    </div>
					 
                    <div class="col-md-4">
					<h3 class="text-center text-success" style="padding-top: 15px;padding-bottom: 15px;color: #1b6ce5!important;font-family: Itim, serif;font-weight: bold;">Teacher FAQs</h3>
                        <div id="faqlist2" class="accordion accordion-flush">
                            <!-- Start: accordion-item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-3" style="font-family: Itim, serif;">
                                        <br>
                                        <strong>How to re-open an quiz?</strong>
                                        <br>
                                        <br>
                                    </button>
                                </h2>
                                <div id="content-accordion-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </section>
		 <?php include('landingpage_footer.php'); ?>
                    <!-- End: Footer with social media icons -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
                    </script>
                    <script src="assets/js/script.min.js">
                    </script>