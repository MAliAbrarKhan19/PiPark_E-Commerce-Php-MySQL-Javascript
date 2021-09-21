<?php 

session_start();
//clearcart

if (filter_input(INPUT_POST, 'clearcart')) {
  //session_destroy();
  session_unset();
}

include('dbconfig.php');
 
$item_array= array();

if (filter_input(INPUT_POST, 'order')) 
{
    if (isset($_SESSION['cart'])) {
      $count= count($_SESSION['cart']);
      
      $item_array = array_column($_SESSION['cart'], 'sl');
       
      if(!in_array(filter_input(INPUT_GET, 'id'), $item_array))
      {
        $_SESSION['cart'][$count]=array(
            'sl' => filter_input(INPUT_GET, 'id'),
            'item_name'=>filter_input(INPUT_POST, 'item_name'),
            'item_price'=>filter_input(INPUT_POST, 'item_price'),
            'item_quantity'=>filter_input(INPUT_POST, 'item_quantity')
        );
      }
      else{// CHK duplicacy of items
        for ($i = 0; $i < count($item_array); $i++){
          if ($item_array[$i]==filter_input(INPUT_GET,'id')) {
            //add item quantity to products
            $_SESSION['cart'][$i]['item_quantity'] += filter_input(INPUT_POST,'item_quantity');
          }
        }
      }

    }
    else{
      //if Cart dosent exist
      $_SESSION['cart'][0]=array(
            'sl' => filter_input(INPUT_GET, 'id'),
            'item_name'=>filter_input(INPUT_POST, 'item_name'),
            'item_price'=>filter_input(INPUT_POST, 'item_price'),
            'item_quantity'=>filter_input(INPUT_POST, 'item_quantity')
      );
    }
  }

  //delete item from cart========================
  if (isset($_GET["action"])) {
    if ($_GET["action"]=="delete") {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['sl']==$_GET['id']) {
          unset($_SESSION['cart'][$key]);
          echo '<script>alert("Product is removed")</script>';
          echo '<script>window.location="index.php")</script>';
        }
      }
    }
  }
// pre_r($_SESSION);

// function pre_r($array){
//   echo "<pre>";
//   print_r($array);
//   echo "</pre>";
// }

 
 ?>
<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->
   
 
   
<!--     body   -->

<!-- Modal Button -->
 <!-- Button trigger modal -->
      <div class="row fixed-top" style="margin-top:60px; ">
        
      <div class="offset-md-10 col-md ">
        <button type="button" class="btn btn-danger " style="" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 100px;">
          <b class=""> View Cart <i class="bi bi-cart4"></i> </b>
        </button>
      </div>
    </div>
<!-- Modal Button -->


<div class="row " style="margin: 10px; padding: 10px;">


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Your Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                

                <!-- ----------------------------------CART---------------------- -->
                  <table class="table table-hover table-danger">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"> X </th>
                          </tr>
                        </thead>

                    <!-- Fetch Cart Items Dynamically -->
                    <?php
                    $total=0; 
                      if(!empty($_SESSION["cart"])){
                        
                        $cartno=1;// for counting item no
                        foreach ($_SESSION["cart"] as $key => $value) {
                          
                        ?>
                        <!-- Fetch Cart Items Dynamically -->

                        <tbody>
                          <tr>
                            <th scope="row"><?php echo $cartno; ?></th>
                            <td><?php echo $value['item_name']; ?></td>
                            <td><?php echo $value['item_price']; ?> BDT</td>
                            <td><?php echo $value['item_quantity']; ?></td>
                            <td><?php echo number_format(($value['item_quantity']*$value['item_price']), 2);?></td>
                            <td><a href ="index.php?action=delete&id=<?php echo $value['sl']; ?>"><span class="badge-danger">  X  </span></a></td>
                          </tr>
                       

                          <?php 
                            $total= $total+($value['item_quantity']*$value['item_price']);
                           ?>
                          
                        <!-- Fetch Cart Items Dynamically -->
                    <?php 
                       $cartno+=1;

                        }
                        

                      }

                    ?>
                    <tr>
                            <th scope="row">Total</th>
                            <th scope="row text-left"><?php echo number_format($total,2); ?></th>
                          </tr>
                    <!-- Fetch Cart Items Dynamically -->
                         </tbody>
                      </table>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Order More !</button>
                
                <form method="post" action="checkout.php">
                <!-- Clear Cart Button -->

                  <input type="submit" name="clearcart" class="btn btn-outline-danger" value="Checkout" style="margin: 8px;">

                </form>
               <!--  <button type="button" class="btn btn-success">Checkout</button> -->
                
                <!-- Form -->
                  <form method="post" action="index.php">
                <!-- Clear Cart Button -->

                  <input type="submit" name="clearcart" class="btn btn-danger text-white" value="Clear Cart" style="margin: 8px;">

                </form>

              </div>
            </div>
          </div>

    </div>


</div>

<!-- Block -->
<div class="row p-5" style="

background-attachment: scroll;
background-image: url(./images/cart1.jpg); 
background-size: cover;

">
  <div class="col text-center text-light" style="color:blue;">
      <h3 class="h3 m-3">
        Welcome to
      </h3>
     <h1 class="m-4 display-1 text-danger">
       <i>Pink Park</i>
     </h1>
     <small class="display-6 text-light m-5"> Online Ecommerce developed with Html, CSS, Bootstrap, Php and MySQL</small>
  </div>
</div>
<!-- Block -->


<!-- =======================================
                   master row
====================================== -->
<div class="row">
 <!-- =======================================
                   master row
====================================== -->




  


        <!-- ------------Collumn 2-------------- -->
        <div class="offset-md-1 col-md-10 col-sm-10">
          <!-- ------------Collumn 2-------------- -->




      <!-- 
      ========================================
                Display Porducts
      ========================================= 
      -->
       
           <div class="row">
             

           <?php 

            require_once('dbconfig.php');
            $query= "SELECT*FROM item ORDER BY sl ASC";
            $result= mysqli_query($con, $query);
            $num_rows=mysqli_num_rows($result);

            
            if ($num_rows > 0){
              while ($row = mysqli_fetch_assoc($result)){

              //Fetch Array Start: Items
          ?>


            <div class="col-md-4" style=" padding: 2px;">
              <form method="post" action="index.php?action=add&id=<?php echo $row['sl'];?>">
                <!--      ITEMS        -->
                      
                        <div class="card border-danger text-center" style="width: 80%; height: 20%;  ">

                          <img src="<?php echo $row['item_img']; ?>" class="card-img-top" alt="<?php echo $row['item_name']; ?>" style="height: 180px;">
                          <div class="card-body">

                            <h6 class="card-title"><?php echo $row['item_name']; ?></h6>

                            <span class="badge badge-dark">Price: <?php echo $row['item_price']; ?> TK</span>
                            
                            <!--   //<p class="card-text font-weight-lighter"><?php  //echo $row['sl']; ?></p> -->


                            <!-- <div class="">
                              <p class="card-text font-weight-lighter"><?php echo $row['item_des']; ?></p>
                              
                            </div> -->
                            
                            <!-- Name -->
                            <input type="hidden" name="item_name" class="form-control" value="<?php echo $row['item_name']; ?>">

                            <!-- Price -->
                            <input type="hidden" name="item_price"class="form-control" value="<?php echo $row['item_price']; ?>" style="margin: 8px; width: 20px;">

                            <!-- // Product Quantity -->
                            <div class="form-floating ml-auto">
                              <input type="text" name="item_quantity" id="floatingquantity" class="form-control" value="1" style=" "> 
                              <label class="form-label" for="floatingquantity">Quantity</label>

  
                            </div>
                            

                            <!-- Order Button -->
                            <input type="submit" name="order" class="btn btn-danger text-white" value="Order it" style="margin: 8px;">

                            <!-- Details Button -->
                            <input type="submit" name="" class="btn btn-outline-danger" value="Details " style="margin: 8px;">


                            
                          </div>
                        </div>
                      
                    <!--      ITEMS        -->
                
              </form>
              
            </div>



           <?php
                //Fetch Array End
                };
              };

          ?>

           </div> 

      <!-- 
      ========================================
        Display Porducts Ends
      ========================================= 
      -->


          <!-- ------------Collumn 2-------------- -->
        </div>
        <!-- ------------Collumn 2-------------- -->




        <!-- ------------Collumn 1-------------- -->
        <!-- <div class="col-md-3 bg-danger text-white"> -->
          <!-- ------------Collumn 1-------------- -

          
            </div>   -->

          <!-- ------------Collumn 1-------------- -
        </div>
        - ------------Collumn 1-------------- -->
         
            <!-- ----------------------------------------------------------------------- -->




<!-- =======================================
                   master row
====================================== -->

</div>

<!-- =======================================
  master row
====================================== -->



    




<!--     body   -->

    



    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
