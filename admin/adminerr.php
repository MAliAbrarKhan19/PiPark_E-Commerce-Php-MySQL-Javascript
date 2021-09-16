<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->


<div class="row">
  
 <!-- 									Master Row																		  -->
  

 <!--====================================================================-->
<!-- === Side Bar ==========================================-->
 <!--==============================================================================-->

<div class="col-md-2 " style=" background-color: #d3d6d8;">
	<?php include 'sidebar.php'; ?>
	
</div>



  
<!-- === Side Bar ========================================= -->
  




  <div class="col-md-10">
  
<!-- === Main Content ========================================= -->
  
 	<div class="row">
 		<br>
 		<br>
 	</div>
 	<div class="row">
 		<!-- ===================================Orders BOX ===== -->
					
          <div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
              <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
              <div class="card-body p-1">
                <h1 class="card-title text-warning"> ORDERS </h1>
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
 		<!-- ===================================Order got ===== -->
    <!-- ==== Pending Orders BOX ===== -->
				<div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
            <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
            <div class="card-body p-1">
              <h1 class="card-title text-danger"> PENDING ORDERS </h1>
              <span class="badge badge-danger"></span>

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
 		<!-- ===================================Pending Order  ===== -->
    <!-- ==== Pending Orders BOX ===== -->
          <div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
                          <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
                          <div class="card-body p-1">
                            <h1 class="card-title text-danger"> ORDERS DONE</h1>
                            <span class="badge badge-danger"></span>

                            <?php 
                            $d='NULL';
                              $query= "SELECT*FROM invoice WHERE inv_delivery= 'done'";
                      $result= mysqli_query($con, $query);
                      $num_rows=mysqli_num_rows($result);


                       ?>

                            <h4 class="card-text font-weight-lighter text-danger">Number of Orders Done</h4>
                            <p class="card-text font-weight-lighter display-3 text-danger"><?php echo $num_rows; ?></p>

                            
                            <!-- Submit Button -->
                            <!-- <input type="submit" name="order" class="btn btn-warning text-white" value="Order it" style="margin: 8px;"> -->

                            
                          </div>
                        </div>
    <!-- ===================================Pending Order  ===== -->
 		<!-- ===================================Items  ===== -->
					<div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
                          <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
                          <div class="card-body p-1">
                            <h1 class="card-title text-warning">Items </h1>
                            <span class="badge badge-danger"></span>

                            <?php include 'dbconfig.php';//connect info to database ?>
                            <?php 
                            	$query= "SELECT*FROM item ORDER BY sl ASC";
					                     $result= mysqli_query($con, $query);
					                 $num_rows=mysqli_num_rows($result);


					             ?>

                             <h4 class="card-text font-weight-lighter"> Total Number of Items</h4>
                            <p class="card-text font-weight-lighter display-4"><?php echo $num_rows; ?></p>
                            
                            
                          </div>
          </div>



 		<!-- ===================================Items  ===== -->






<!-- ----------------------------------------------------------------------------------------------- -->
   	</div>




  <!-- === Main Content ========================================= -->
  </div>




 <!-- 									Master Row																		  -->
</div>
    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>

<!--    Footer Starts   -->
<div class="row justify-content-center bg-danger " style="margin-top: 0px;">
    <div class="col-md-6">
            
                
        <p class="h6 " style="color:#fcfcf9; ">&copy; 2021 Copyright all rights reserved. Developed by <a href="#">ID-135</a> </p>
                
            
    </div>
</div>

    <!-- Optional JavaScript -->
    
    

     <!-- Optional JavaScript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
      <script src="../js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>