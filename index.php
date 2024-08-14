<?php
session_start();

include("common_function.php");
include("database.php");

//when user logs in:
if(isset($_SESSION['logged_in'])){
	

   //checking if user has items in cart:
	$user_ip = getIPAddress();
	$select_cart= "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
	$run_cart = mysqli_query($mysqli, $select_cart);
	$check_cart = mysqli_num_rows($run_cart);

	if($check_cart > 0){
        $message = "Login Succesful! You have items in your cart.";
    }else{
        $message = "Login Succesful.";
    }
	
	unset($_SESSION['logged_in']);
}

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
	

		.frontpage {
			background-image: url("images/done.png");
			background-position: center;
			background-size: 100% 99%;
			text-align: center;
			font-size: 60px;
			width: 1000;
			height: 600px;
			background-repeat: no-repeat;
			color: white;
	 

		}

		.accreditation{

			justify-content: center;
    align-items: center;
background-color: white;
    display: flex;
    flex-direction: column;
    min-height: 80vh;
		}

		.rounded-images {
			display: flex;
			justify-content: center;
			margin-top: 50px;
		}
		
		.rounded-image {
			border-radius: 50%;
			border: 3.5px solid black;
			width: 170px;
			height: 170px;
			object-fit: cover;
			margin: 30px;
		}

		.picture-container{
    padding: 2rem;
		}

		.slider-wrapper{
			position: relative;
			max-width: 48rem;
			margin: 0 auto;
		}

		.slider{
			display: flex;
			aspect-ratio: 20/12;
			overflow-x: auto;
			scroll-snap-type: x mandatory;
			scroll-behavior: smooth;
			box-shadow: 0 1.5rem 2.5rem hsla(0,0%, 0%, 0.25);
			border-radiusL 0.5rem;
		}

		.slider img{
			flex: 1 0 100%;
			scroll-snap-align: start;
			object-fit: cover;
		}

		.slider-nav{
			display: flex;
			column-gap: 1rem;
			position: absolute;
			bottom: 1.25rem;
			left: 50%;
			transform: translateX(-50%);
			z-index: 1;
		}

		.slider-nav a{
			width: 0.5rem;
			height: 0.5rem;
			background-color: #fff;
			border-radius: 50%;
			opacity: 0.5;
			transition: opacity ease 250ms;
		}

		.slider-nav a:hover{
			opacity: 1;
		}
		


		/*containers for 3 boxes of text - home page*/
.box{
    position: relative;
    width: 80%;
    height: 550px;
    background-color: black;
    border: 2px solid black;
    text-align: center;
    line-height: 30px;
    border-radius: 15px;
    padding-left: 10px;
    padding-right:10px;
    padding-top: 10px;
    padding-bottom: 10px;

}



	
	</style>

</head>


<body>

	<!--Bootstrap JS Link-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<header>
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
						<a class="nav-link active"  style="font-size:20px;" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xs" style="color: #FFD43B;"></i> Home</a>
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
						<a class="nav-link "  style="font-size:20px;" href="cart.php"><i class="fa-solid fa-cart-shopping" style="color: #FFD43B;"></i> Cart  <sup style="color:white;"> <?php cart_item();?></sup></a>
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

			  <nav class="navbar navbar-expand-lg navbar-dark bg-success bg-gradient text-white" style="height:20%; padding:0; margin:0;">
				<ul class="navbar-nav me-auto">
					
						<?php
							if(isset($_SESSION['username'])){
								
								echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px; color:white;'>Welcome, ".$_SESSION['username'].".</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link'  style='font-size:20px;  ' href='logout.php'><u>Logout</u></a>
								</li>";	
							}else{

								echo "<li class='nav-item'>
								<a class='nav-link' style='font-size:20px;  color:white;'>Welcome Guest.</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link' style='font-size:20px;  ' href='login.php'><u>Login</u></a>
								</li>";
							}
						?>
					
			

			
				</ul>
				
				</nav>	

		</div>

	</header>


	<section class="frontpage">
		<br>
		<p style="color: white; font-size: 55px;">Exotic Pest Control & Cleaning</p>
		<p style="color: #ECFFDC; font-size: 30px;">Looking after the environment </p>
<br>
		<div class="quote">
		<a href="quote.php"><button class="q-button" style="color:white">Get a Free Qoute!</button></a>
		</div>
		<div class="rounded-images">
			<img src="images/cockroach1.jfif" alt="Image 1" class="rounded-image">
			<img src="images/bedbug.jfif" alt="Image 2" class="rounded-image">
			<img src="images/bee.jfif" alt="Image 3" class="rounded-image">
			<img src="images/termite.jfif" alt="Image 4" class="rounded-image">
 
		</div>
		<br>
	</section>


	<section class="intro">
		<p>
			<br><br><br><br><br>
			Don't let pests turn your home into theirs! Exotic Pest Control & Cleaning offers peace of mind by protecting your family from harmful insects and rodents. Our services eliminate existing infestations, prevent future problems, and safeguard your property from costly damage. Enjoy a cleaner, healthier home with the help of our experts</p><BR><BR>
	</section>


	
	<section class="picture-container">
		<div class= "slider-wrapper">
			<div class="slider">
				<img id="slide-1" src="images/card.jpg" alt="Cockroach">
				<img id="slide-2" src="images/bees.jpg" alt="Cockroach">
				<img id="slide-3" src="images/happy.jpg" alt="Cockroach">
				<img id="slide-4" src="images/car1.jpg" alt="Cockroach">
				<img id="slide-5" src="images/spray2.jpg" alt="Cockroach">
				<img id="slide-6" src="images/soil.jpg" alt="Cockroach">
				<img id="slide-7" src="images/car2.jpg" alt="Cockroach">
				<img id="slide-8" src="images/housespray.jpg" alt="Cockroach">

			</div>
			<div class="slider-nav">
				<a href="slide-1"></a>
				<a href="slide-2"></a>
				<a href="slide-3"></a>
				<a href="slide-4"></a>
				<a href="slide-5"></a>
				<a href="slide-6"></a>
				<a href="slide-7"></a>
				<a href="slide-8"></a>		
			</div>
		</div>
	</section>
	<br><br>






	<div class="accreditation">
		<br><br>
			<i class="fa-solid fa-award fa-2xl" style="color: green;"></i>
			<br>
 
			<h1 style="color: black;   font-family: 'Cursive', Lucidia Handwriting; font-size:30px;">Accredited by:</h1>
			<br>
				<div style="text-align: center;">
				<img src='images/agri.png' alt='Department of Agriculture logo.' width='30%' height='30%'>
		
				<span style="width: 10px; display: inline-block;"></span>
				<img src='images/sapca.jfif' alt='Department of Agriculture logo.' width='12%' height='10%'>


			</div>
			<br><br>
			<hr style="border-top: 5px solid black;">
			<br><br><br><br>
			
			<h1 style="color: black; font-family: 'Cursive', Lucidia Handwriting; font-size:30px;">Our happy customers include:</h1>
			<br>
			<div style="text-align: center;">
				<img src='images/spur.png' alt='Spur logo.' width='160px' height='90px'>
				<span style=" display: inline-block;"></span>
				<img src='images/panarottis.jfif' alt='Panarottis logo.' width='220px' height='130px'>
				<span style="width: ; display: inline-block;"></span>
				<img src='images/trafalgar.png' alt='Panarottis logo.' width='240px' height='100px'>
				<span style="width: 40px; display: inline-block;"></span>
				<img src='images/link.png' alt='Panarottis logo.' width='120px' height='90px'>
				<span style="width: 40px; display: inline-block;"></span>
				<img src='images/midas.jfif' alt='Panarottis logo.' width='140px' height='110px'>

			</div>
			<br>
			<div style="text-align: center;">
				<img src='images/spargs.png' alt='Spur logo.' width='160px' height='90px'>
				<span style="width:25px; display: inline-block;"></span>
				<img src='images/mowana.png' alt='Spur logo.' width='150px' height='100px'>
				<span style=" display: inline-block;"></span>
				<img src='images/sama.png' alt='Spur logo.' width='160px' height='90px'>
				<span style=" display: inline-block;"></span>
				<img src='images/dewing.png' alt='Spur logo.' width='160px' height='90px'>
				<span style=" display: inline-block;"></span>
				<img src='images/kwa.png' alt='Spur logo.' width='210px' height='70px'>
				<span style=" display: inline-block;"></span>
			</div>
		
		<br><br><br>

	</div>


		




</body>


<footer class="footer">	
			<div class="bg-black text-white p-3 text-center">
			
				<p>© Exotic Pest Control & Cleaning</p>
				<p>Designed By Ashley Charumbira - 2024</p>
			</div>
</footer>

</html>