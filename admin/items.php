<?php include 'dbconfig.php';//connect info to database ?>

<?php 

//edit get sl value
 if (isset($_GET["action"])) {
    if ($_GET["action"]=="edit") {
    	$_SESSION['edit_sl']=$_GET['id'];
    	echo "Edit_id ".$_SESSION['edit_sl'];
    }
}
//edit_db where sl
if (isset($_POST['edit_db'])) {
	$sl=$_POST['sl'];
	$item_name=$_POST['item_name'];
	$item_des=$_POST['item_des'];
	$item_price=$_POST['item_price'];
	 
	//code for image uploading
	if($_FILES['item_img']['name'])
	{
	move_uploaded_file($_FILES['item_img']['tmp_name'], "../img/".$_FILES['item_img']['name']);
	$item_img="./img/".$_FILES['item_img']['name'];
	}
	 
	$i="UPDATE item SET item_name='$item_name', item_des='$item_des', item_price='$item_price', item_img='$item_img' WHERE sl='$sl'";
	//UPDATE `item` SET `sl`=[value-1],`item_name`=[value-2],`item_des`=[value-3],`item_price`=[value-4],`item_img`=[value-5] WHERE 1

	if(mysqli_query($con, $i))
	{
	echo "Edited successfully..!";
	unset($_SESSION['edit_sl']);
	echo '<script>alert("Item is edited")</script>';
    echo '<script>window.location="items.php")</script>';
	}
	else {
		echo "NOT Edited! ! ! Error!!";
	}
}


// delete------------------
if (isset($_POST['delete'])) {
	$sl=$_POST['sl'];

	$i="DELETE FROM item WHERE sl='$sl'";
	if(mysqli_query($con, $i))
	{
	echo "Deleted successfully..!";
	}
	else {
		echo "NOT Deleted! ! ! Error!!";
	}

	
}

if(isset($_POST['submit']))
{
	$item_name=$_POST['item_name'];
	$item_des=$_POST['item_des'];
	$item_price=$_POST['item_price'];
	 
	//code for image uploading
	if($_FILES['item_img']['name'])
	{
	move_uploaded_file($_FILES['item_img']['tmp_name'], "../img/".$_FILES['item_img']['name']);
	$item_img="./img/".$_FILES['item_img']['name'];
	}
	 
	$i="insert into item (item_name,item_des,item_price,item_img)values('$item_name','$item_des','$item_price','$item_img')";

	if(mysqli_query($con, $i))
	{
	echo "inserted successfully..!";
	}
	else {
		echo "NOT inserted! ! ! Error!!";
	}

}?>
 



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


<div class="col-md-10">
<!-- ================================== Main Content ===================================================================== -->

	<div class="row">
	<!-- ---------------------------------------Items Input form ------------------------------------------------------------ -->
	<div class="row">
		<div class="col-md-10">
					<div class="m-1 p-1">
							
				<!-- ================Edit Form== -->
							<?php 
							//Verify  Session Edit 
								if (!empty($_SESSION['edit_sl'])) {
							// <!-- Get Data -->
               include 'dbconfig.php';//connect info to database 
                	$d=$_SESSION['edit_sl'];
                	$query= "SELECT*FROM item WHERE sl ='$d'";
			            $result= mysqli_query($con, $query);
			            // $num_rows=mysqli_num_rows($result);
			            
			            
          					// $row = mysqli_fetch_assoc($result);
          					$row=mysqli_fetch_assoc($result);

							?>
							<h3 class="text-danger">
									Edit Items here
							</h3>
						<form method="POST" enctype="multipart/form-data">

								<div class="form-group">
				    			<label  >SL</label>
								<input class="form-control form-control-lg" type="text" name="sl" value="<?php echo $row['sl']; ?>">
								</div>
								<div class="form-group">
				    			<label  >Item Name</label>
									<input class="form-control form-control-lg" type="text" name="item_name" value="<?php echo $row['item_name']; ?>">
								</div>
								<div class="form-group">
					    			<label >Description</label>
									<input class="form-control form-control-lg" type="text" name="item_des" value="<?php echo $row['item_des']; ?>">
								</div>

								<div class="form-group">
				    			<label  >Price</label>
								
								<input class="form-control form-control-lg" type="text" name="item_price" value="<?php echo $row['item_price']; ?>">
								</div>

								
								<div class="form-group">
				    			<label  >Image</label>
                        		<img src="../<?php echo $row['item_img']; ?>" class="img-thumbnail">
								
								<input class="form-control form-control-lg" type="file" name="item_img" >
								<!-- <input class="form-control form-control-lg" type="file" name="items_img"> -->
								
								</div>


							<input type="submit" value="Input" class="text-white btn btn-warning" name="edit_db">
						</form>


							<?php 
								}else{

							 ?>
							 <h3 class="text-danger">
								Items Input Form 
							</h3>

						<form method="POST" enctype="multipart/form-data">
						

							<div class="form-group">
				    			<label  >Item Name</label>
								
								<input class="form-control form-control-lg" type="text" name="item_name">
							</div>

							<div class="form-group">
				    			<label >Description</label>
								
								<input class="form-control form-control-lg" type="text" name="item_des">
							</div>

							<div class="form-group">
			    			<label  >Price</label>
							
							<input class="form-control form-control-lg" type="text" name="item_price">
							</div>

							
							<div class="form-group">
			    			<label  >Image</label>
							
							<input class="form-control form-control-lg" type="file" name="item_img">
							
							</div>
							
							<input type="submit" value="Input" class="text-white btn btn-danger" name="submit">
						</form>
						<?php 
							} 
						?>
					</div>
					
				</div>
			</div>	
	<!-- ----Items Input form ------------ -->


	<!-- --------------------------Ttems display Tables----------------------------------- -->
	<div class="row">
		<div class="col-md-11 p-1 ">
			<div class="border border-danger m-2">
				<table class="table table-hover table-striped table-info">
                        <thead>
                          <tr>
                            <th scope="col">SL.</th>
                            <th scope="col"> Item Image </th>
                            <th scope="col">Item Name </th>
                            <th scope="col"> Price (TK)</th>
                            <th scope="col">Item Description</th>
                            <th scope="col"> Edit </th>
                          </tr>
                        </thead>

                        <!-- Get Data Table -->
                           <?php include 'dbconfig.php';//connect info to database ?>
                            <?php 
                            	$query= "SELECT*FROM item ORDER BY item_name ASC";
									            $result= mysqli_query($con, $query);
									            $num_rows=mysqli_num_rows($result);
									            $i=1;
									            if ($num_rows > 0){
				              						while ($row = mysqli_fetch_assoc($result)){

									             ?>

					     <form  method="POST" enctype="multipart/form-data">
                        <tr>


                        	<!-- SL. --><th scope="col"><?php echo $row['sl']; ?></th>  
                        	<!-- Image -->
                        	<th>
                        		<img src="../<?php echo $row['item_img']; ?>" class="img-thumbnail">
                        	</th>
                        	<!-- Name --><th>
                        		<?php echo $row['item_name']; ?>
                        	</th>
                        	<!-- Price --><th>
                        		<?php echo $row['item_price']; ?>
                        	</th>
                        	<!-- Des --><td>
                        		<?php echo $row['item_des']; ?>
                        	</td>
                        	<!--Edit  -->
                        	<td>
                        			<a href ="items.php?action=edit&id=<?php echo $row['sl']; ?>" class="btn btn-outline-danger">Edit</a>

                        	
                        	<!--Remove  -->
                        		<input type="hidden" name="sl" value="<?php echo $row['sl']; ?>">
                        		<!-- Button trigger modal -->
                        		<input type="submit" name="delete" class="btn btn-outline-danger" value="Delete" >
                        	</td>
                        </tr>

                        		<?php
                        				
                        			}
                        		}
                        		 ?>
                        </form>
				</table>
			</div>
		</div>
	</div>
	<!-- ---------------------Ttems display form------------------------------ -->


	</div>

<!-- ================================== Main Content ============================================ -->

</div>
 <!-- 									Master Row																		  -->
</div>


   
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
