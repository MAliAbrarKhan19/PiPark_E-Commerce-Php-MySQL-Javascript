<?php include 'header.php'; ?>
<!-- header  -->

<!-- main row starts-->
<div class="row">
<!-- main row starts-->

	<!-- side bar Starts -->
	<div class="col-md-2">
	<!-- side bar Starts -->
		<?php include 'sidebar.php'; ?>

	<!-- side bar Ends -->
	</div>
	<!-- side bar Ends -->

	<!-- Contents starts -->
	<div class="col-md-10">
		<div class="row">	
	<!-- Contents starts -->
		<!-- Orders starts -->
		<!-- Orders starts -->
		 		<!-- ===================================Orders BOX ===== -->
					
          <div class="col-md-4 card border-danger text-center m-1 p-2" style="width: 80%; height: 20%;  ">
              <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
              <div class="card-body p-1">
                <h1 class="card-title text-danger"> ORDERS </h1>
                <span class="badge badge-danger"></span>

                <?php include 'dbconfig.php';//connect info to database ?>
                <?php 
                	$query= "SELECT*FROM invoice ORDER BY id ASC";
                   $result= mysqli_query($con, $query);
                   $num_rows=mysqli_num_rows($result);
                 ?>

                 <h4 class="card-text font-weight-lighter"> Total Number of Orders</h4>
                <p class="card-text font-weight-lighter display-3"><?php echo $num_rows; ?></p>
                

                
              </div>
          </div>
		<!-- Orders ends   -->
		<!-- Orders ends   -->

		<!-- Pending Orders box Starts -->
		<!-- Pending Orders box Starts -->
			<div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
	            <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
	            <div class="card-body p-1">
	              <h1 class="card-title text-danger"> PENDING ORDERS </h1>
	              <span class="badge badge-danger"></span>
                <?php include 'dbconfig.php';//connect info to database ?>
	              
	             	<?php 
	              $d='NULL';
	              $query= "SELECT*FROM invoice WHERE inv_delivery= 'on the way'";
	              $result= mysqli_query($con, $query);
	              $num_rows=mysqli_num_rows($result);       ?>

	              <h4 class="card-text font-weight-lighter text-danger">Number of Orders On the way</h4>
	              <p class="card-text font-weight-lighter display-3 text-danger"><?php echo $num_rows; ?></p>
	              
	              <!-- Submit Button -->
	              <!-- <input type="submit" name="order" class="btn btn-warning text-white" value="Order it" style="margin: 8px;"> -->

	              
	            </div>
	        </div>
		<!-- Pending Orders box Ends   -->
		<!-- Pending Orders box Ends   -->
	<!-- Contents ends   -->
		</div>
	</div>
	<!-- Contents ends   -->


<!-- main row ends  -->
</div>
<!-- main row ends  -->

<!-- footer -->
<?php include 'footer.php'; ?>