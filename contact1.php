<?php
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
//include('/home/kasturic/public_html/Websites/worldempower.in/testing/phpmailer/class.phpmailer.php');

$name= $_POST['name'];
$email= $_POST['email'];
$mobno=  $_POST['mobileno'];
$address=  $_POST['address'];
$message =  $_POST['message'];


saveClientContact($name,$email,$mobno,$address,$message);

mailToClient($name,$email,"Thank You for Contacting Us !");

mailToHubioImpex($name,$email,$mobno,$message);

function saveClientContact($name,$email,$mobno,$address,$message){
    include('conn.php');
    $query="insert into tbl_enquiry(name,email,contact,address,message) values('$name','$email','$mobno','$address','$message')";
    mysqli_query($conn,$query) or die(mysqli_error());
}



function mailToClient($name,$emailid,$subject)
        {
        	$content="
        
            <table border='0' width='250' height='455'>
			<tr>
				<td height='68' width='250' ><img src=http://hubioimpex.in/img/img/logo.png></td>
			</tr>
			<tr>
				<td height='52' width='250'><font color=red>Hi $name,</font></td>
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
                     <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hubio Impex Pvt. Ltd</strong><br>
					 <span class='contact-icon'><i class='fa fa-map-marker' style='font-size:24px;color:red'></i></span>&nbsp;&nbsp;   Registered Office :- Sr.No. 1/7/ 1/17,<br>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bldg Aditya, Wing A & B,<br>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Shop No.05,Haveli,Shivne (Part)<br>
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (N.V.),Pune,MH - 411023<br><br>
					 <span class='contact-icon'><i class='fa fa-phone' style='font-size:24px;color:red'></i></span>&nbsp; (+91) 020 21055600<br><br>
					 <span class='contact-icon'><i class='fa fa-envelope' style='font-size:24px;color:red'></i></span>&nbsp; hubioimpex@gmail.com
					 </address>
				</td>
			</tr>
		</table>
        	";
	        $email = new PHPMailer();
	        $email->From      = 'hubioimpex@gmail.com';
	        $email->FromName  = 'Hubio Impex Pvt. Ltd ';
	        $email->Subject   = $subject;
	        $email->Body      = $content;
	        $email->IsHTML(true); 
	        $email->AddAddress( $emailid );
	        $b=$email->Send();
	        
	        
       	}

function mailToHubioImpex($name,$email,$mobno,$message)
        {
        	$content="
        
            <table border='0' width='250' height='455'>
			<tr>
				<td height='68' width='250' ><img src=http://worldempower.in/testing/img/logo.png></td>
			</tr>
			<tr>
				<td height='52' width='250'><font color=red>Hi,</font></td>
			</tr>
			<tr>
				<td height='41' width='250'>
				    You have received an enquiry from $name.<br>
				    Name : $name <br>
				    Email : $email <br>
				    Mobile No : $mobno <br>
				    Message: $message <br>
				</td>
			</tr>
		    <tr>
				<td height='52' width='250'>Regards<br> WorldEmpower Team</td>
			</tr>
    		</table>
        	";
        	$subject=  "New Enquiry : ".date('d-M-Y');
	        $email = new PHPMailer();
	        $email->From      = 'hubioimpex@gmail.com';
	        $email->FromName  = 'World Empower';
	        $email->Subject   = $subject;
	        $email->Body      = $content;
	        $email->IsHTML(true); 
	        $email->AddAddress( 'hubioimpex@gmail.com' );   
	        $b=$email->Send();
	        
	        
       	}
?>

<script> 
window.location.href = "contact2.php";
</script>