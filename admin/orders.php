<?php include 'dbconfig.php';//connect info to database ?>

<?php 


$inv_id="";//editcanceled
//Edit deliverr status
if (isset($_GET["action"])) {
    if ($_GET["action"]=="editdone") {

    	$id=$_GET['id'];
    	$d="Done";
    	//UPDATE `invoice` SET `inv_delivery`=[value-15] WHERE 1
	    $i="UPDATE invoice SET inv_delivery='$d' WHERE inv_id='$id'";
		if(mysqli_query($con, $i))
		{
		echo "Delivery done successfully..!";
		}else {
			echo "NOT Updated! ! ! Error!!";
		}
    }
    elseif ($_GET["action"]=="editonway") {
    	$id=$_GET['id'];
    	$d="on the way";
    	//UPDATE `invoice` SET `inv_delivery`=[value-15] WHERE 1
	    $i="UPDATE invoice SET inv_delivery='$d' WHERE inv_id='$id'";
		if(mysqli_query($con, $i))
		{
		echo "Delivery done successfully..!";
		}else {
			echo "NOT Updated! ! ! Error!!";
		}
    }
    elseif ($_GET["action"]=="editcanceled") {
    	$id=$_GET['id'];
    	$d="canceled";
    	//UPDATE `invoice` SET `inv_delivery`=[value-15] WHERE 1
	    $i="UPDATE invoice SET inv_delivery='$d' WHERE inv_id='$id'";
		if(mysqli_query($con, $i))
		{
		echo "Delivery done successfully..!";
		}else {
			echo "NOT Updated! ! ! Error!!";
		}
    }
}



// delete------------------
 if (isset($_GET["action"])) {
    if ($_GET["action"]=="delete") {

		$id=$_GET['id'];
		echo " Delete id ".$id;
    	$i="DELETE FROM invoice WHERE inv_id='$id'";
	if(mysqli_query($con, $i))
	{
	echo "Deleted successfully..!";
	}
	else {
		echo "NOT Deleted! ! ! Error!!";
	}
	$i="DELETE FROM inv_orders WHERE inv_id='$id'";
	if(mysqli_query($con, $i))
	{
	echo "Deleted successfully..!inv_orders";
	}
	else {
		echo "NOT Deleted! ! ! Error!!inv_orders";
	}

    }
}




 ?>
<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->


<div class="row">
 
 <!-- 									Master Row																		  -->
 

 
	<!-- side bar Starts -->
	<div class="col-md-2">
	<!-- side bar Starts -->
		<?php include 'sidebar.php'; ?>

	<!-- side bar Ends -->
	</div>
	<!-- side bar Ends -->


<div class="col-md-10 " style=" ">
<!--  =============Orders Manage Page    == -->
	<div class="row">
	<!-- ----------------------------------------------Orders Table------------------------------------------------------------ -->
			<div class="col-md-11 m-1">
			<!-- -------------------------------------Table-------------------------------------------------------------------- -->
				<div class="m-2 p-1">
				<table class="table table-bordered border-danger table-hover">
                        <thead class="">
                          <tr>
                            <th scope="col">SL. no.</th>
                            <th scope="col"> Date & Time</th>
                            <th scope="col">Invoice ID</th>
                            <th scope="col"> Billed Total Amount </th>
                            <!-- <th scope="col"> Details </th> -->
                            <th scope="col"> Delivery Status     </th>
                            <th scope="col"> Remove </th>
                          </tr>
                        </thead>

                        <!-- get Orders from invoice table -->
                        <?php include 'dbconfig.php';//connect info to database ?>
                            <?php 
                            	$query= "SELECT*FROM invoice ORDER BY id Desc";//inv_date, inv_time,inv_id
                            	$result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            $i=1;
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){
					             ?>
                        <!-- get Orders from invoice table -->

                        <!-- table -->
                        	<tr>
                        		<!-- SL. no. -->
                        		<th>
                        			<?php echo $row['id']; ?>
                        		</th>

                        		<!-- Date -->
                        		<th>
                        			<?php echo $row['inv_date']."  &  "; ?>
                        		<!-- Time -->
                        			<?php echo $row['inv_time']; ?>
                        			
                        		</th>

                        		<!-- Invoice ID -->
                        		<th>
                        			<?php //echo $row['inv_id']; 
                        			$inv_id= $row['inv_id'];
                        			echo $inv_id; ?>

                        			<!-- Order Details  -->
                        			<a href ="invoiceview.php?action=view&id=<?php echo $row['inv_id']; ?>" class="btn btn-outline-danger ">Order Details</a>
                        			
                        		</th>

                        		<!-- Total -->
                        		<th>
                        			<?php echo $row['inv_grandtotal']." Taka "; ?>
                        			
                        		</th>

                        		<th>
                        			<!--Delivery Status  -->
                        			<em>
                        			<?php
                        				if (empty($row['inv_delivery'])) {
                        					echo "<p>Delivery <span class='text-light bg-danger'> not done!!</span></p>";
                        				}else{
                        					echo "<p> Delivery  <span class='text-light bg-danger'>".$row['inv_delivery']." ...</span></p>";
                        				}
                        			 ?>
                        			 </em>
                        			<!-- Change Status -->
                        			<p><a href ="orders.php?action=editdone&id=<?php echo $row['inv_id']; ?>" class="btn btn-warning text-white">Done</a>
                        			</p>
                        			<p>
                        			<a href ="orders.php?action=editonway&id=<?php echo $row['inv_id']; ?>" class="btn btn-warning text-white">On The Way</a>
                        			<a href ="orders.php?action=editcanceled&id=<?php echo $row['inv_id']; ?>" class="btn btn-warning text-white">Canceled</a>
                        				
                        			</p>
                        		</th>

                        		<!-- Remove -->
                        		<th>
                        			<a href ="orders.php?action=delete&id=<?php echo $row['inv_id']; ?>" class="btn btn-danger text-white">Delete Order</a>
                        		</th>
                        	</tr>
                        <!-- table -->
                        <!-- get Orders from invoice table -->

					             <?php 
					             	}
					         	} ?>
                        <!-- get Orders from invoice table -->
                </table>
            	</div>
			<!-- -------------------------------------Table-------------------------------------------------------------------- -->
			</div>
	<!-- --------------------Orders Table----------------------------------- -->


	</div>
	
<!--  =============Orders Manage Page    == -->
</div>

 
 <!-- 									Master Row																		  -->
 
</div>





    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
