<?php session_start();
//2echo "<h1> invoice_id  ".$_SESSION['invoice_id']."</h1>";

 ?>
<!--   Header Starts   -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->


		<div class="row  m-5">
			<div class="col-md-8 offset-md-2 p-5" style="

background-attachment: scroll;
background-image: url(./images/cart.jpg); 
background-size: cover;

">
				<div class="row border border-light" style="background-color:rgba(252, 0, 67, 0.4);">
					<div class="col-md-12 ">
						<p class="text-light text-center display-5">We have recieved your order. Please keep the invoice ID shown below to track your order.</p>
						<h1 class="bg-light text-danger text-center">
							<em>Invoice ID:<?php echo $_SESSION['invoice_id']; ?></em> 
						</h1>
						<p class="text-dark text-center">For any query please call our customer care center @ 010012345678 </p>

					</div>
				</div>
			</div>
		</div>



<!-- ========================================= -->


<?php unset($_SESSION['cart']); ?>
<!-- ========================================= -->
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>