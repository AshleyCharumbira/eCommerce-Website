<?php
session_start();
	include("database.php");
	include("common_function.php");
    
    
$username = $_SESSION['username'];

$get_user = "SELECT * FROM user WHERE username = '$username'";
$result_user = mysqli_query($mysqli, $get_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_id = $row_user['user_id'];

// Get the user's cart
$get_ip = getIPAddress();
$invoice_number= mt_rand();
$status = "pending";
$total_price = 0;
$total_products = 0;
$total_quantity = 0;
$get_cart = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
$run_cart = mysqli_query($mysqli, $get_cart);
$count = mysqli_num_rows($run_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    $product_id = $row_cart['product_id'];
    $quantity = $row_cart['quantity'];
    $get_products = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_products = mysqli_query($mysqli, $get_products);
    while($row_products = mysqli_fetch_array($run_products)){
        $product_price = $row_products['price'];
        $sub_total = $product_price * $quantity;
        $total_quantity += $quantity;
        $total_price += $sub_total;
    }
}

$total_price = $total_price*1.15; // Add 15% tax

// Insert the order into the database:
$insert_order = "INSERT INTO orders (user_id, amount, invoice_number, total_products, order_status) VALUES ('$user_id', $total_price, '$invoice_number', $total_quantity, '$status')";
$run_order = mysqli_query($mysqli, $insert_order);


    
//pending orders:
$insert_pending_order = "INSERT INTO orders_pending (user_id, invoice_number, quantity, order_status, amount) VALUES ('$user_id', '$invoice_number', $total_quantity , '$status', $total_price)";
$run_pending = mysqli_query($mysqli, $insert_pending_order);

//getting order id 
$order_id = "SELECT * FROM orders WHERE invoice_number=$invoice_number";
$run_order_id = mysqli_query($mysqli, $order_id);
$row_order_id = mysqli_fetch_assoc($run_order_id);
$orders_id = $row_order_id['order_id'];
$_SESSION['order_id'] = $orders_id;

// Clear the cart:
$delete_cart = "DELETE FROM cart_details WHERE ip_address='$get_ip'";
$run_delete = mysqli_query($mysqli, $delete_cart);

if($run_order){
    echo "<script>alert('Order has been submitted successfully!')</script>";

}


?>
	



<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Dashboard</title>
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

		<!--logo pulled from database-->

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
						<a class="nav-link"  style="font-size:20px;" href="cart.php"><i class="fa-solid fa-cart-shopping" style="color: #FFD43B;"></i> Cart  <sup style="color:white;"> <?php cart_item();?></sup></a>
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
							echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px; color:white;'> ".$_SESSION['username']."'s Dashboard.</a>
								</li>";
						
						?>
				</ul>
			    </nav>	
            

		</div>

   

		<br><br><br><br>
                     <h2>Order Succesful!</h2>
					 <h1 style="color:white; font-size:25px;">Kindly note that your order status will be updated once cash is received or PayPal payment is confirmed.</h1>

		<br><br>

        <div class="text-align:center;">
			<div class="text-center">
				<a href="profile.php?my_order"><button class="q-button" style="color:white;">Go to My Dashboard</button></a>
			</div>
		</div>

            </div>
        </div>









</header>
    <BR><hr>


<BR><BR>

		


</body>
		

<footer class="footer">	
			<div class="bg-black text-white p-3 text-center">
			
				<p>© Exotic Pest Control & Cleaning</p>
				<p>Designed By Ashley Charumbira - 2024</p>
			</div>
</footer>
</html> 