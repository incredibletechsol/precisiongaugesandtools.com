<!DOCTYPE html>
<html lang="en">

<head>
 <?php include('head.php'); ?>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <?php include('topbar.php'); ?>
 <!-- ======= Top Bar End ======= -->
  <!-- ======= Header ======= -->
   <?php include('header.php'); ?>	
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <h2>Enquiry</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="contact">
      <div class="container">

        <div class="row">
		  <div class="col-lg-4">
            <div class="sidebar">
    			  <img src="images/enquiry.png">
            </div><!-- End sidebar -->
          </div><!-- End blog sidebar -->	

          <div class="col-lg-8">
			   <form method="post" action="contact1.php" id="contactform" class="php-email-form">	
				  <div class="mb-3">
					<div class="loading">Loading</div>
					<div class="error-message"></div>
					<div class="sent-message">Your message has been sent. Thank you!</div>
				  </div>
				  <div class="form-row">
					<div class="col form-group">
					  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
					  <div class="validate"></div>
					</div>
					<div class="col form-group">
					  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
					  <div class="validate"></div>
					</div>
				  </div>
				 <div class="form-row">
					<div class="col form-group">
					  <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="Your Contact No" data-rule="minlen:10" data-msg="Please enter 10 digit mobile no" />
					  <div class="validate"></div>
					</div>
					<div class="col form-group">
					  <input type="text" class="form-control" name="address" id="address" placeholder="Your Address" data-rule="minlen:10" data-msg="Please enter a valid address" />
					  <div class="validate"></div>
					</div>
				  </div>
				  <div class="form-group">
					<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write your Enquiry details" placeholder="Message"></textarea>
					<div class="validate"></div>
				  </div>
				 <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End blog entries list -->
		</div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
   <?php include('footer.php'); ?>
  <!-- End Footer -->
 <?php include('commonjs.php'); ?>

</body>
</html>