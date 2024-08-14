<?php
session_start();
include("common_function.php");
include("database.php");
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

    <style>

        .service-page{
    justify-content: center;
    align-items: center;
    background-image: url("images/login-bg4.jfif");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    min-height: 80vh;
        }

        
.service-box{
    width: 700px;
    max-width: 400px;
    margin: 0 auto; 
    height: 700px;
    position: relative;
    background: transparent;
    border: 2px solid white;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(15px);
}


</style>
</head>


<body>

	<!--Bootstrap JS Link-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<header>


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
					  
					
				
					<form class="d-flex" role="search">
					  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					  <button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				  </div>
				</div>
			  </nav>

			  <nav class="navbar navbar-expand-lg navbar-dark bg-success bg-gradient text-white" style="height:20%">
				<ul class="navbar-nav me-auto">
				<?php
							if(isset($_SESSION['username'])){
								
								echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px; color:white;'>Welcome, ".$_SESSION['username'].".</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link'  style='font-size:20px; ' href='logout.php'><u>Logout</u></a>
								</li>";	
							}else{

								echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px;color:white;'>Welcome Guest.</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link' style='font-size:20px; ' href='login.php'><u>Login</u></a>
								</li>";
							}
						?>
				</ul>
				</nav>	

		</div>

	</header>

<section class="service-page">
    <br>

<div class="service-box"  >

    <form action="https://formspree.io/f/xvoejjqw" method="POST">
            <h1 style="color:white; font-size:30px;">Request Inspection</h1>

            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-spray-can-sparkles" style="color: #1f8018;"></i></span>
				<label>Inspection Requested For: </label>
				<br><br>
				<select name="Service" id="service" required="required" style="background-color: transparent;">
					<?php
					$select_services = "SELECT * FROM certificates";
					$result_services = mysqli_query($mysqli, $select_services);

					while($row_services = mysqli_fetch_assoc($result_services)){
						$service_name = $row_services['certificate_name'];
						echo "<option value='$service_name'>$service_name</option>";
					}
					?>
				</select>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-envelope" style="color: #1f8018;"></i></span>
                <input type ="email" id="email" name = "Email Adderss" required="required">
                <label>Email Address</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-house" style="color: #1f8018;"></i></span>
                <input type ="text" id="address" name="Physical Address" required="required">
                <label>Physical Address</label>
            </div>

            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-phone" style="color: #1f8018;"></i></span>
                <input type ="text" id="number" name="Contact Number" required="required">
                <label>Contact Number</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-ruler" style="color: #1f8018;"></i></span>
                <input type ="text" id="square_meters" name="Square Meters of Property" required="required">
                <label>Square Meterage of Property: </label>
            </div>
      
            

            <div>
                <div class="text-center">
                    <button type="submit" name="sign_up" value="sign_up" class="q-button" stye="  padding: 10px 20px;">Request Inspection</button>
                </div>
            </div>


        </form>
    </div>
    <br><br>




</body>
</section>


<footer class="footer" style="with:100%; flex-shrink:0;">	
			<div class="bg-black text-white p-3 text-center">
			
				<p>© Exotic Pest Control & Cleaning</p>
				<p>Designed By Ashley Charumbira - 2024</p>
			</div>
</footer>
</html>