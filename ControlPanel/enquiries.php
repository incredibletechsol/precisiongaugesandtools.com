<?php include('logincommon.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php include('title.php'); ?></title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <?php include('nav.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
           
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h3>All Enquiries</h3>
							
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
							                <th>Name</th>
										    <th>Email Id</th>
                                            <th>Contact</th>
											<th>Address</th>
                                            <th>Message</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										include('conn.php');
										$fetch_basic_profile="select * from tbl_enquiry order by id asc";	
										
										$basic_profile_rs= mysqli_query($conn,$fetch_basic_profile);
                                                                                $i=0;
										while($basic_profile_row = mysqli_fetch_array($basic_profile_rs)) 
											{
											$id=$basic_profile_row[0];
											echo "<tr>";
											echo "<td>".$basic_profile_row[1]."</td>";
											echo "<td>".$basic_profile_row[2]."</td>";
											echo "<td>".$basic_profile_row[3]."</td>";
											echo "<td>".$basic_profile_row[4]."</td>";
											echo "<td>".$basic_profile_row[5]."</td>";
											echo "<td><a href='enquiriesactions.php?id=$id&msg=delete'><img src='images/cross.png'></a></td>";
											echo "</tr>";
											} 
										?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
			<br><br><br><br><br><br>  <br><br><br><br><br><br>    
        </div>
         
    </div>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
$('#dataTables-example').dataTable({
"order": [[ 0, "asc" ]]
});
});
</script>
<script src="assets/js/custom.js"></script>
</body>
</html>
