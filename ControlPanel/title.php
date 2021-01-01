<?php
$pageName = basename($_SERVER['PHP_SELF']);
if($pageName == "index.php")
	{
	echo "Admin : Precision Gauges and Tools";
	}
if($pageName == "enquiries.php")
	{
	echo "Enquiries";
	}	
if($pageName == "gallery.php")
	{
	echo "Gallery";
	}	
?>