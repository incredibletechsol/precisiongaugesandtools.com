<?php
if($_POST)
{
require('constant.php');
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
include('/home/kasturic/public_html/Websites/worldempower.in/testing/phpmailer/class.phpmailer.php');
    
    $user_name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $user_phone     = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $address         = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $content        = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
    if(empty($user_name)) {
		$empty[] = "<b>Name</b>";		
	}
	if(empty($user_email)) {
		$empty[] = "<b>Email</b>";
	}
	if(empty($user_phone)) {
		$empty[] = "<b>Phone Number</b>";
	}
	if(empty($address)) {
		$empty[] = "<b>Address</b>";
	}
	if(empty($content)) {
		$empty[] = "<b>Message</b>";
	}
	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
        die($output);
	}
	
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> is an invalid Email, please correct it.'));
		die($output);
	}
	
	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('component/recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
				die($output);				
		  }	
	}
 
    include('conn.php');
    $query="insert into tbl_enquiry(name,email,contact,address,message) values('$user_name','$user_email','$user_phone','$address','$content')";
    mysqli_query($conn,$query) or die(mysqli_error());

    $clientmailcontent="
            <table border='0' width='250' height='455'>
			<tr>
				<td height='68' width='250' ><img src=http://www.precisiongaugesandtools.com/testing/images/logo.gif></td>
			</tr>
			<tr>
				<td height='52' width='250'><font color=red>Hi $user_name,</font></td>
			</tr>
			<tr>
				<td height='41' width='250'>
					This is to let you know that we have received your email and one of our representative will contact you soon.<br><br>
					Please do not reply to this email as it will not be received.<br><br>
					This is an auto generated response to your enquiry sent by us.
				</td>
			</tr>
			<tr>
				<td height='122' width='250'>
					<br>
                     <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Precision Gauges and Tools</strong><br>
					 <span class='contact-icon'><i class='fa fa-map-marker' style='font-size:24px;color:red'></i></span>&nbsp;&nbsp;   Registered Office :- Sr.No.27. Kharadi, Pune,<br>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Maharashtra 411014,<br>
					 <span class='contact-icon'><i class='fa fa-phone' style='font-size:24px;color:red'></i></span>&nbsp; (+91) 9850153992 / 8485027429 / 9665027939<br><br>
					 <span class='contact-icon'><i class='fa fa-envelope' style='font-size:24px;color:red'></i></span>&nbsp; precisiongt@rediffmail.com
					 </address>
				</td>
			</tr>
		</table>";
		
	        $email = new PHPMailer();
	        $email->From      = 'kasturic@kasturicollection.com';
	        $email->FromName  = 'Precision Gauges and Tools';
	        $email->Subject   = "Precision Gauges and Tools";
	        $email->Body      = $clientmailcontent;
	        $email->IsHTML(true); 
	        $email->AddAddress( $user_email );
	        $b=$email->Send();
	   
	   
        	$precisionmailcontent="
        
            <table border='0' width='250' height='455'>
			<tr>
				<td height='68' width='250' ><img src=http://www.precisiongaugesandtools.com/testing/images/logo.gif></td>
			</tr>
			<tr>
				<td height='52' width='250'><font color=red>Dear Sir,</font></td>
			</tr>
			<tr>
				<td height='41' width='250'>
				    You have received an enquiry from $user_name.<br>
				    Name : $user_name <br>
				    Email : $user_email <br>
				    Mobile No : $user_phone <br>
				    Message: $content <br>
				</td>
			</tr>
		    <tr>
				<td height='52' width='250'>Regards<br> Precision Gauges and Tools</td>
			</tr>
    		</table>";
    		
        	$subject=  "New Enquiry : ".date('d-M-Y');
	        $email = new PHPMailer();
	        $email->From      = 'kasturic@kasturicollection.com';
	        $email->FromName  = 'Precision Gauges and Tools';
	        $email->Subject   = $subject;
	        $email->Body      = $precisionmailcontent;
	        $email->IsHTML(true); 
	        $email->AddAddress( 'info@worldempower.in' );   
	        $b=$email->Send();
     $output = json_encode(array('type'=>'message', 'text' => '<b> Thank You for Contacting Us.We will get back to you !</b>'));
	die($output);
}
?>