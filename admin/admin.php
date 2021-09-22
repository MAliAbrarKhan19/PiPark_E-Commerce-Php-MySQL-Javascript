<?php include 'header.php'; ?>
<!-- header  -->

<!-- main row starts-->
<div class="row">
<!-- main row starts-->

	<!-- side bar Starts -->
	<div class="col-md-2">
		<?php include 'sidebar.php'; ?>
	</div>
	<!-- side bar Ends -->

	<!-- Contents starts -->
	<div class="col-md-9">
		<!-- <div class="row">	 -->
	<!-- Contents starts -->
		<!-- Orders starts -->
		 		<!-- ===================================Orders BOX ===== -->
					
          

                <?php include 'dbconfig.php';//connect info to database ?>
                <?php 
                	$query= "SELECT*FROM invoice ORDER BY id ASC";
                   $result= mysqli_query($con, $query);
                   $num_rows=mysqli_num_rows($result);
                 ?>
              <div class="row mt-5 mb-3 p-1 bg-danger">
              	<div class="col-md-8">
              		<h1 class="text-light"> ORDERS </h1>
                 	<h4 class="font-weight-lighter"> Total Number of Orders</h4>
              	</div>
              	<div class="col-md-4">
              		<p class="display-2"><?php echo $num_rows; ?></p>
              	</div>                
              </div>
		<!-- Orders ends   -->

		<!-- Pending Orders box Starts -->
					          <?php include 'dbconfig.php';//connect info to database ?>
			              
			             	<?php 
			              $query= "SELECT*FROM invoice WHERE inv_delivery= 'on the way'";
			              $result= mysqli_query($con, $query);
			              $num_rows=mysqli_num_rows($result);       ?>
              <div class="row mt-2 mb-3 p-1 bg-warning">
              	<div class="col-md-8">
              		<h1 class="text-light"> PENDING ORDERS  </h1>
                 	<h4 class="font-weight-lighter"> Number of Orders On the way</h4>
              	</div>
              	<div class="col-md-4">
              		<p class="display-2"><?php echo $num_rows; ?></p>
              	</div>                
              </div>
 		<!-- Pending Orders box Ends   -->
 		<!-- Orders Delivered box Starts   -->

			             	<?php 
			              $query= "SELECT*FROM invoice WHERE inv_delivery= 'done'";
			              $result= mysqli_query($con, $query);
			              $num_rows=mysqli_num_rows($result);       ?>
              <div class="row mt-2 mb-3 p-1 bg-success">
              	<div class="col-md-8">
              		<h1 class="text-light"> ORDERS Delivered  </h1>
                 	<h4 class="font-weight-lighter"> Number of Orders 'done' or Delivered </h4>
              	</div>
              	<div class="col-md-4">
              		<p class="display-2"><?php echo $num_rows; ?></p>
              	</div>                
              </div>
 		<!-- Orders Delivered box Ends   -->
 		<!-- Orders Cancelled  box Starts   -->
					          <?php include 'dbconfig.php';//connect info to database ?>

			             	<?php 
			              $query= "SELECT*FROM invoice WHERE inv_delivery= 'canceled'";
			              $result= mysqli_query($con, $query);
			              $num_rows=mysqli_num_rows($result);       ?>
              <div class="row mt-2 mb-3 p-1 bg-dark">
              	<div class="col-md-8">
              		<h1 class="text-light"> ORDERS Cancelled </h1>
                 	<h4 class="font-weight-lighter text-light"> Number of Orders Cancelled </h4>
              	</div>
              	<div class="col-md-4">
              		<p class="display-2 text-light"><?php echo $num_rows; ?></p>
              	</div>                
              </div>
 		<!-- Orders Cancelled  box Ends   -->
 		<!-- Items  box Starts   -->
					          <?php include 'dbconfig.php';//connect info to database ?>

			             	<?php 
			              $query= "SELECT*FROM item ORDER BY sl ASC";
			              $result= mysqli_query($con, $query);
			              $num_rows=mysqli_num_rows($result);       ?>
              <div class="row mt-2 mb-3 p-1 bg-info">
              	<div class="col-md-8">
              		<h1 class="text-light">Items </h1>
                 	<h4 class="font-weight-lighter text-light"> Number of Items </h4>
              	</div>
              	<div class="col-md-4">
              		<p class="display-2 text-light"><?php echo $num_rows; ?></p>
              	</div>                
              </div>
 		<!-- Items box Ends   -->



	<!-- Contents ends   -->
		<!-- </div> -->
	</div>
	<!-- Contents ends   -->


<!-- main row ends  -->
</div>
<!-- main row ends  -->

<!-- footer -->
<?php include 'footer.php'; ?>