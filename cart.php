<?php
session_start();
	include("database.php");
	include("common_function.php");

	
?>


<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exotic Pest Control & Cleaning</title>
	<!--Bootstrap CSS Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!--FontAwesome Link-->
	<script src="https://kit.fontawesome.com/3576e9fb10.js" crossorigin="anonymous"></script>
	<!--CSS link-->
	<link rel="stylesheet" href="main.css">
</head>


<body>

	<!--Bootstrap JS Link-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<header>

	<!--calling cart function-->
	<?php
		cart();	
	?>


		<div class="container-fluid p-0">

		<!--header-->
			
			<nav class="navbar navbar-expand-lg navbar-dark bg-black text-white">
				<div class="container-fluid">
				
				<?php
					 $select_admin = "SELECT * FROM logo_table WHERE logo_id = 1";
					 $result_admin = mysqli_query($mysqli, $select_admin);

					 while($row_admin = mysqli_fetch_assoc($result_admin)){
						$logo = $row_admin['logo'];
						echo "<img src='admin_area/logo_images/$logo' alt='Company logo.' width='7%' height='7%'>";
					 }
					
					?>


				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">

				  <!--navigation bar for smaller screens-->
				  <ul class="sidebar">
					 <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="24px" fill="black"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
					  <li >
						<a class="nav-link"  style="font-size:20px;" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xs" style="color: #FFD43B;"></i>  Home</a>
					  </li>
					  <li >
						<a class="nav-link" style="font-size:20px;" href="services.php"><i class="fa-solid fa-broom" style="color: #FFD43B;"></i>  Services</a>
					  </li>
					  <li >
						<a class="nav-link"  style="font-size:20px;" href="products.php"><i class="fa-solid fa-spray-can-sparkles" style="color: #FFD43B;"></i>  Products</a>
					  </li>
					  <li >
						<a class="nav-link"  style="font-size:20px;" href="certificates.php"><i class="fa-solid fa-pen-to-square fa-xs" style="color: #FFD43B;"></i>  Certificates</a>
					  </li>
					  <li >
						<a class="nav-link"  style="font-size:20px;" href="contact.php"><i class="fa-solid fa-phone" style="color: #FFD43B;"></i>  Contact Us</a>
					  </li>
					  <li >
						<a class="nav-link active"  style="font-size:20px;" href="cart.php"><i class="fa-solid fa-cart-shopping" style="color: #FFD43B;"></i>  Cart  <sup style="color:white;"> <?php cart_item();?></sup></a>
					  </li>
				
					
					</ul>


					 <!--navigation bar for desktops-->
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="hideOnMobile">
							<a class="nav-link"  style="font-size:20px;" aria-current="page" ></a>
						  </li>
						  <li class="hideOnMobile">
							<a class="nav-link"  style="font-size:20px;" aria-current="page" ></a>
						  </li>
					  <li class="hideOnMobile">
						<a class="nav-link"  style="font-size:20px;" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xs" style="color: #FFD43B;"></i> Home</a>
					  </li>
					  <li class="hideOnMobile">
						<a class="nav-link" style="font-size:20px;" href="services.php"><i class="fa-solid fa-broom" style="color: #FFD43B;"></i>Services</a>
					  </li>
					  <li class="hideOnMobile">
						<a class="nav-link"  style="font-size:20px;" href="products.php"><i class="fa-solid fa-spray-can-sparkles" style="color: #FFD43B;"></i> Products</a>
					  </li>
					
					  <li class="hideOnMobile">
						<a class="nav-link"  style="font-size:20px;" href="contact.php"><i class="fa-solid fa-phone" style="color: #FFD43B;"></i>Contact Us</a>
					  </li>
					  <li class="hideOnMobile">
						<a class="nav-link active"  style="font-size:20px;" href="cart.php"><i class="fa-solid fa-cart-shopping" style="color: #FFD43B;"></i> Cart  <sup style="color:white;"> <?php cart_item();?></sup></a>
					  </li>
					  <li class="menu-button">
							<a class="nav-link"  style="font-size:20px;" aria-current="page" ></a>
						  </li>
						  <li class="menu-button">
							<a class="nav-link"  style="font-size:20px;" aria-current="page" ></a>
						  </li>
					  <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" fill="green" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
				
					
					</ul>
					<form class="d-flex" role="search" action="search_product.php" methof="get">
					<input class="form-control me-2" type="search" placeholder="Search Products" aria-label="Search" name="search_data">
					<input type="submit" class="btn btn-outline-success" value="Search" name="search_data_product">
					</form>
				  </div>
				</div>
			  </nav>

			  <nav class="navbar navbar-expand-lg navbar-dark bg-success bg-gradient text-white" style="height:20%">
				<ul class="navbar-nav me-auto">
				<?php
							if(isset($_SESSION['username'])){
								
								echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px;color:white;'>Welcome, ".$_SESSION['username'].".</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link'  style='font-size:20px;' href='logout.php'><u>Logout</u></a>
								</li>";	
							}else{

								echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px; color:white;'>Welcome Guest.</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link' style='font-size:20px; ' href='login.php'><u>Login</u></a>
								</li>";
							}
						?>
				</ul>
			    </nav>	
            

		</div>

		<div>
			<br>
			<h3 class="text-center" style="color:#6d9f33">Cart</h3>
		</div>
</header>

<!--cart item details-->

<div class="small-container cart-page">
	<table>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Update Quantity</th>
			<th>Subtotal</th>
		</tr>	

			
	<form action="" method="POST">
		  <!--php for dynamic cart data-->
		  <?php
                    $ip = getIPAddress();
                    $total = 0;
					$tax = 0;
					$final_amount = 0;
					$subtotal = 0;

					//getting cart details
                    $select_cart = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
                    $result_cart = mysqli_query($mysqli, $select_cart);

					$num_rows = mysqli_num_rows($result_cart);

					
					//getting product details for each item in cart
                    while($row = mysqli_fetch_assoc($result_cart)){
                        $cart_id = $row['product_id'];   //product id from cart_details
                        $current_quantity = $row['quantity'];
                        $select_product = "SELECT * FROM products WHERE product_id = $cart_id";
					    $result_product = mysqli_query($mysqli, $select_product);
						
						
                        while($row_product_price = mysqli_fetch_assoc($result_product)){
                            $price_one = $row_product_price['price'];
                            $product_id = $row_product_price['product_id']; 
                            $product_title = $row_product_price['product_name'];
                            $product_image = $row_product_price['product_image'];

							if(isset($_POST['remove_cart_'.$product_id])){
								$remove_id = $product_id;
								$delete_cart = "DELETE FROM cart_details WHERE ip_address = '$ip' AND product_id = '$remove_id'";
								$result_delete = mysqli_query($mysqli, $delete_cart);
								if($result_delete){
									echo "<script>alert('Item removed from cart.')</script>";
									echo "<script>window.open('cart.php', '_self')</script>";
								}
							}

							if(isset($_POST['update_cart_'.$product_id])){
								$current_quantity = $_POST['quantity_'.$product_id];
								$update_cart = "UPDATE `cart_details` SET `quantity` = '$current_quantity' WHERE `ip_address` = '$ip' AND `product_id` = '$product_id'";
								$result_updatecart = mysqli_query($mysqli, $update_cart);
								if($result_updatecart){
									echo "<script>alert('Cart updated.')</script>";
									echo "<script>window.open('cart.php', '_self')</script>";
								}
							}

							$subtotal = $price_one*$current_quantity;
							$total += $price_one*$current_quantity;
						}

						$tax = 0.15*$total;
						$final_amount = $total + $tax;

							
                        
            ?>
		
		<!--individual cart items-->
		<tr>
			<td>
				<div class="cart-info">
					<img src="admin_area/product_images/<?php echo $product_image ?>" class="cart_image">
					<div>
						<br>
						<p style="color:grey"><?php echo $product_title ?></p>

						<small style="color:white">R <?php echo $price_one ?></small>
						<br>
						<input type="submit" value="Remove Item" name="remove_cart_<?php echo $product_id; ?>" style="width: 100px; color:green; background:black; border:green">


					</div>
				</div>
			</td>
			
	

		<!--quantity-->
		<td>
			<input type="number" name="quantity_<?php echo $product_id; ?>" value="<?php echo $current_quantity; ?>" class="form-input w-10">
			<input type="hidden" name="product_id_<?php echo $product_id; ?>" value="<?php echo $product_id; ?>">
		</td>

          

			<!--update cart-->
			<td>
				<input type="checkbox" name="update_cart_<?php echo $product_id; ?>" style="width: 120px; color:black; border-radius:50px;">
			</td>

		

			<td>R <?php echo $subtotal ?></td>
		</tr>

		<?php
						
			}	

        
	?>
	
    </table>
 


	<?php
    if($total == 0) {
		echo "<br><br><br>";
        echo "<h3 class='text-center' style='color:white'>Shopping cart empty.</h3>";
        echo "</div>";
		echo "<br>";
		echo "<div class='text-center'>;
				<a href='products.php'><button class='bg-success px-3 py-2 border-0 mx-3 text-light'>Continue Shopping</button></a>
			  </div>";
    } else {
	?>

	<div style="text-align:right;">
		<input type="submit" value="Update Cart" class="bg-success px-3 py-2 border-0 " name='updating_cart'>
		
	</div>
	</form>
	<br>

	<div class="total-price" style="text-align: right;">
		<table>
			<tr>
				<td>Subtotal</td>
				<td>R <?php echo $total ?></td>
			</tr>
			<tr>
				<td>Tax(15%)</td>
				<td>R <?php echo $tax ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>R <?php echo $final_amount ?></td>
			</tr>
		</table>
	</div>
	




<div style="text-align:right;">
<br><br>
	<a href="products.php"><button class="bg-success px-3 py-2 border-0 mx-3 text-light">Continue Shopping</button></a>
	<a href="checkout.php"><button class="px-3 py-2 border-0 text-light" style="background:green">Checkout</button></a>
</div>
<?php
	}
	?>

</div>
</div>


<!--JS for reponsive navbar-->
<script>
	function showSidebar(){
		const sidebar = document.querySelector('.sidebar');
		sidebar.style.display = 'flex';
	}
	function hideSidebar(){
		const sidebar = document.querySelector('.sidebar');
		sidebar.style.display = 'none';	}

</script>



</body>
<br><br><br>


<footer class="footer"> 	
			<div class="bg-black text-white p-3 text-center">
			
				<p>© Exotic Pest Control & Cleaning</p>
				<p>Designed By Ashley Charumbira - 2024</p>
			</div>
</footer>
</html> 