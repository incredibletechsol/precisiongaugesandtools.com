<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
<style>

.imgcls {
width : 350px;
height : 200px;
}
</style>
</head>

<body>

 <?php include('topbar.php'); ?>
  <!-- ======= Header ======= -->
 <?php include('header.php'); ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <h2>Gallery</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row portfolio-container">
		
          <?php
			include('conn.php');
			$result = mysqli_query($conn,"SELECT * FROM tbl_gallery order by photoid desc") or die('Query Not Executed');
			$count = mysqli_num_rows($result);
			if($count > 0) {
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='col-lg-4 col-md-6 portfolio-item filter-app'>";
					echo "<div class='portfolio-wrap'>";
					  echo "<img src='gallery/$row[1]' class='imgcls' alt=''>";
					  echo "<div class='portfolio-info'>";
						echo "<h4>$row[2]</h4>";
						echo "<div class='portfolio-links'>";
						  echo "<a href='gallery/$row[1]' data-gall='portfolioGallery' class='venobox' title='$row[2]'><i class='bx bx-plus'></i></a>";
						echo "</div>";
					  echo "</div>";
					echo "</div>";
					echo "</div>";
				}
			}
			else
				echo "<h4>No Photos Available</h4>";
			
		?>
		  
        </div>
      </div>
    </section>
	<!-- End Portfolio Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
   <?php include('footer.php'); ?>
  <!-- End Footer -->

 <?php include('commonjs.php'); ?>
</body>

</html>