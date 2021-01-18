<!DOCTYPE html>
<html lang="en">

<head>
 <?php include('head.php'); 
 require('constant.php');
 ?>
  <script src="component/jquery/jquery-3.2.1.min.js"></script>
 <script>
     
     function isNumberKey(evt)
       {
          var chCode = (evt.which) ? evt.which : event.keyCode
          if (chCode != 46 && chCode > 31 
            && (chCode < 48 || chCode > 57))
             return false;
          else
          return true;
       }
       
       function isAlpha(keyCode)
        {
            return ((keyCode >= 65 && keyCode <= 90) || keyCode == 8 || keyCode == 32 || keyCode == 9 || keyCode == 46)
        }
 </script>
 <script>

	$(document).ready(function (e){
		$("#frmContact").on('submit',(function(e){
			e.preventDefault();
			$("#mail-status").hide();
			$('#send-message').hide();
			$('#loader-icon').show();
			$.ajax({
				url: "contact.php",
				type: "POST",
				dataType:'json',
				data: {
				"name":$('input[name="name"]').val(),
				"email":$('input[name="email"]').val(),
				"phone":$('input[name="phone"]').val(),
				"address":$('input[name="address"]').val(),
				"message":$('textarea[name="message"]').val(),
				"g-recaptcha-response":$('textarea[id="g-recaptcha-response"]').val()},				
				success: function(response){
				$("#mail-status").show();
				$('#loader-icon').hide();
				if(response.type == "error") {
					$('#send-message').show();
					$("#mail-status").attr("class","error");				
				} else if(response.type == "message"){
					$('#send-message').hide();
					document.getElementById('frmContact').reset();
					$("#mail-status").attr("class","success");		
					setTimeout(function () {SUCCESS.innerHTML =""}, 10000);
				}
				$("#mail-status").html(response.text);	
				},
				error: function(){} 
			});
		}));
	});
	</script>
	<style>
	.label {margin: 2px 0;}
	.field {margin: 0 0 20px 0;}	
		.content {width: 960px;margin: 0 auto;}
		h1, h2 {font-family:"Georgia", Times, serif;font-weight: normal;}
		div#central {margin: 40px 0px 100px 0px;}
		@media all and (min-width: 768px) and (max-width: 979px) {.content {width: 750px;}}
		@media all and (max-width: 767px) {
			body {margin: 0 auto;word-wrap:break-word}
			.content {width:auto;}
			div#central {	margin: 40px 20px 100px 20px;}
		}

		#message {  padding: 0px 40px 0px 0px; }
		#mail-status {
			padding: 12px 20px;
			width: 100%;
			display:none; 
			font-size: 1em;
			font-family: "Georgia", Times, serif;
			color: rgb(40, 40, 40);
		}
	  .error{background-color: #F7902D;  margin-bottom: 40px;}
	  .success{background-color: #48e0a4; }
		.g-recaptcha {margin: 0 0 25px 0;}	  
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>	
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
			   <form id="frmContact" action="" method="POST" novalidate="novalidate" class="php-email-form">
				  <div id="loader-icon" style="display:none;"><img src="images/loader.gif" /></div>
				  	 <div id='SUCCESS'><div id="mail-status"></div></div>
				  <div class="form-row">
					<div class="col form-group">
					  <input type="text" id="name" name="name" placeholder="enter your name here" title="Please enter your name" class="required form-control" aria-required="true" required>
					  <div class="validate"></div>
					</div>
					<div class="col form-group">
					 <input type="text" id="email" name="email" placeholder="enter your email address here" title="Please enter your email address" class="required email form-control" aria-required="true" required>
					  <div class="validate"></div>
					</div>
				  </div>
				 <div class="form-row">
					<div class="col form-group">
					  <input type="text" id="phone" name="phone" placeholder="enter your phone number here" title="Please enter your phone number" class="required phone form-control" aria-required="true" onkeypress="return isNumberKey(event)" maxlength="10" required/>
					  <div class="validate"></div>
					</div>
					<div class="col form-group">
					  <input type="text" class="form-control" name="address" id="address" placeholder="Your Address" title="Please enter a valid address" required />
					  <div class="validate"></div>
					</div>
				  </div>
				  <div class="form-group">
					<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write your Enquiry details" placeholder="Message"></textarea>
					<div class="validate"></div>
				  </div>
				  <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>			
			
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