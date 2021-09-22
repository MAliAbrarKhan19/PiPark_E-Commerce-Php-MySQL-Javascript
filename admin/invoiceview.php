<?php 


$inv_id="";

if (isset($_GET['action'])) {
    if ($_GET['action']=='view') {
        $inv_id=$_GET['id'];
           
    }
}


 ?>
<?php include 'dbconfig.php';//connect info to database ?>

<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->


<div class="row">
 
 <!-- 	Master Row -->
 
 
    <!-- side bar Starts -->
    <div class="col-md-2">
    <!-- side bar Starts -->
        <?php include 'sidebar.php'; ?>

    <!-- side bar Ends -->
    </div>
    <!-- side bar Ends -->



<div class="col-md-10 ">
	<div class="row">
	<!--   ----Orders Table  ------------------ -->
			<div class="col-md-12 m-1 p-4">
			<!-- -------------------------------------Table  -------------------------- -->

                
        <!-- Border Row ================ -->
        <div class="row">
            <div class="col-md-10">
                <!-- ------------------------------------Invice Details Form  ----- -->
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <h5>
                            To,
                        </h5>
                        <h2 class="">
                            Invoice ID : <?php echo $inv_id; ?>
                        </h2>
                   </div>
                    <?php 

                     $query= "SELECT*FROM invoice where inv_id='$inv_id' ";
                                            $result= mysqli_query($con, $query);
                                            $num_rows=mysqli_num_rows($result);
                    //SELECT `id`, `inv_id`, `inv_time`, `inv_date`, `inv_name`, `inv_email`, `inv_mobile`, `inv_address`, `inv_destaddress`, `inv_total`, `inv_shippingcharge`, `inv_vat`, `inv_grandtotal`, `inv_inwords`, `inv_delivery` FROM `invoice` WHERE 1
                                            if ($num_rows > 0){
                                                while ($row = mysqli_fetch_assoc($result)){  
                                            
                     ?>
                    <div class="form-group">
                        <p><!-- date --><label>Date :</label><?php echo $row['inv_date']; ?> </p>

                        <p><!-- time --><label>Time  :</label><?php echo $row['inv_time']; ?></p>
                    </div>
                    <div class="form-group">
                        <p>  <!-- name --><label>Name : </label><?php echo $row['inv_name']; ?></p>
                    </div>
                    <div class="form-group">
                        <p>
                    <!-- mobile --> <label>Mobile :</label><?php echo $row['inv_mobile']; ?>
                       </p>
                        <p>
                    <!-- email --> <label>Email :</label><?php echo $row['inv_email']; ?>
                         </p>
                        <p>
                    <!-- address --><label>Address</label><?php echo $row['inv_address']; ?>
                        </p>
                        <p>
                    <!-- destaddress --><label>Delivery Address :</label><?php echo $row['inv_destaddress']; ?>
                        </p>
                    </div>


                </form>
                    <!-- ------------------------------------Invice Details Form  ----- -->
                    <!-- Fetch Cart Items Dynamically -->
                                    <?php 
                                       // $cartno+=1;

                                        }
                                            
                                      }

                                    ?>
            </div>       
            </div>    


                    <!-- -----------------------------------------CART List  --------- -->
                    <!--     -->
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                    <!--   ======= -->
                    <!-- ----------------------------------CART---------------------- -->
                            <table class="table table-hover table-bordered border-danger">
                                <thead>
                                    <th colspan="6" class="bg-danger text-center text-light">Order details</th>
                                </thead>
                                <thead>
                                  <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Unit Price </th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col"> X </th>
                                  </tr>
                                </thead>
                                <!-- Fetch Cart Items Dynamically -->
                                <?php 

                                //Declare Cal vaariables
                                $total=0;
                                $grandtotal=0;
                                $inv_shippingcharge=50;
                                $vat=0;
                              
                               // include 'dbconfig.php';//connect info to database 
            
                                $query= "SELECT*FROM inv_orders where inv_id='$inv_id' ";
                                $result= mysqli_query($con, $query);
                                $num_rows=mysqli_num_rows($result);
                                
                                if ($num_rows > 0){
                                    while ($value = mysqli_fetch_assoc($result)){  
                                ?>
                                    <!-- Fetch Cart Items Dynamically -->

                                    <tbody>
                                      <tr>
                                        <th scope="row"><?php echo $value['inv_cartno']; ?></th>
                                        <td><?php echo $value['item_name']; ?></td>
                                        <td><?php echo $value['item_price']; ?> BDT</td>
                                        <td><?php echo $value['item_quantity']; ?></td>
                                        <td><?php echo ($value['item_total']);?></td>
                                        <!-- <td><a href ="checkout.php?action=delete&id=<?php echo $value['']; ?>"><span class="badge-danger">  X  </span></a></td> -->
                                      </tr>
                                   

                                      <?php 
                                      //Calculating all totals
                                        $total= $total+($value['item_quantity']*$value['item_price']);

                                        $vat= ($total*15)/100;//Vat calculation

                                        $grandtotal= $total+$vat+$inv_shippingcharge;//

                                        $inwords=$value['inv_inwords'];
                                       ?>
                                      
                                    <!-- Fetch Cart Items Dynamically -->
                                <?php 
                                   // $cartno+=1;

                                    }
                                        
                                  }

                                ?>
                                <tr>    
                                        <td></td>
                                        <td></td>
                                    <th scope="row" colspan="2">Total</th>
                                    <td scope="row " colspan="2"  class="text-end"><?php echo number_format($total,2); echo " TK"; ?></td>
                                </tr>
                                <tr>
                                    
                                    <td></td>
                                    <th></th>
                                    <td colspan="2">VAT (15%)<!-- //$vat--> </td>
                                    <td colspan="2"  class="text-end"> <?php echo number_format($vat,2); echo " TK"; ?></td>
                                </tr>
                                <tr>
                                    
                                    <th></th>
                                    <td></td>
                                    <td colspan="2">Shipping Charge <!-- //$shippingcharge --> </td>
                                    <td colspan="2" class="text-end"> <?php echo number_format($inv_shippingcharge,2); echo " Tk"; ?></td>
                                    

                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <th colspan="2" class="text-end">Grand Total </th>
                                    <th colspan="2" class="text-end"> <?php echo number_format($grandtotal,2); echo " TK"; ?></th>
                                </tr>
                                <?php 

                                //Declare Cal vaariables
                                $total=0;
                                $grandtotal=0;
                                $inv_shippingcharge=50;
                                $vat=0;
                              
                               // include 'dbconfig.php';//connect info to database 
            
                                $query= "SELECT*FROM invoice where inv_id='$inv_id' ";
                                $result= mysqli_query($con, $query);
                                $num_rows=mysqli_num_rows($result);
                                
                                if ($num_rows > 0){
                                    while ($value = mysqli_fetch_assoc($result)){  
                                ?>
                                    <!-- Fetch Cart Items Dynamically -->

                                <tr>
                                    <th></th>
                                    <th colspan="1">In words</th>
                                    <td colspan="4"> <?php echo $value['inv_inwords']." TAKA ONLY"; ?></td>
                                </tr>
                                <?php 
                                 }}
                                 ?>
                                <!-- Fetch Cart Items Dynamically -->
                              </tbody>
                            </table>
                                    

                    </div>
                </div>
                    <!-- -----------------------------------------CART List  --------- -->
                  <button onclick="window.print()" class="btn btn-danger">Print</button>
            
        </div>
                
                <!-- Border Row ================ -->
        </div>
    </div>
</div>
<!--   ----Orders Table  ------------------ -->
	
<!-- =============Orders Manage Page  =================== -->


 
 <!-- 	Master Row			  -->
 
</div>





    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
