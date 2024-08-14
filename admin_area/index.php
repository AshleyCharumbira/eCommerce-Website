<?php
	include("../database.php");

			//Select admin details from database
		$select_admin = "SELECT * FROM admin_table WHERE admin_id =1234";
		$result_admin = mysqli_query($mysqli, $select_admin);

		while($row_admin = mysqli_fetch_assoc($result_admin)){
		$name = $row_admin['admin_name'];
		$admin_image = $row_admin['picture'];
		}
		

?>

<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<!--Bootstrap CSS Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!--FontAwesome Link-->
	<script src="https://kit.fontawesome.com/3576e9fb10.js" crossorigin="anonymous"></script>
	<!--CSS link-->
	<link rel="stylesheet" href="../main.css">
	


	<style>
		
.admin-image{
    width:200px;
    object-fit:contain;
	
}


</style>
</head>


<body class="bg-dark">

	<!--Bootstrap JS Link-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<header>


		<!--navigation bar-->
		<div class="container-fluid p-0">
			
			<nav class="navbar navbar-expand-lg navbar-dark bg-black text-white">
				<div class="container-fluid">

				<!--logo pulled from database-->

					<?php
					 $select_admin = "SELECT * FROM logo_table WHERE logo_id = 1";
					 $result_admin = mysqli_query($mysqli, $select_admin);

					 while($row_admin = mysqli_fetch_assoc($result_admin)){
						$logo = $row_admin['logo'];
						echo "<img src='logo_images/$logo' alt='Company logo.' width='8%' height='8%'>";
					 }
					
					?>

					<h1 style="color: yellow;">Welcome Admin </h1>
				

			  <nav class="navbar navbar-expand-lg navbar-dark bg-success" style="height:40px;">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link text-dark" style="font-size:16px; font-weight:bold;" href="../logout.php">Log Out</a>
					</li>
				</ul>
				</div>
			</nav>	

		<div class="bg-success bg-gradient text-white">
			<h3 class="text-center p-2" style="font-size:20px;">Manage Details</h3>
		</div>

		<!--Details Admin can manage-->
		<div class="row" style="margin:2px; padding-left:100px; display:flex;">
			<div class="col-md-12 bg-dark p-1">
				<br>
				<div class="px-5">

				<a href="#"><img src="profile_pictures/<?php echo $admin_image; ?>" class="admin-image"></a>
				<p class="text-light text-center"><?php echo $name; ?><br><br></p>

				<!--Buttons with things to manage-->
				<div>
					<button class="admin-button"><a href="index.php?calendar" class="nav-link text-light my-1">View Calendar</a></button>
					<button class="admin-button"><a href="index.php?vieworders" class="nav-link text-light my-1">View Orders</a></button>
					<button class="admin-button"><a href="index.php?categories" class="nav-link text-light my-1">View All Categories</a></button>
					<button class="admin-button"><a href="index.php?addproduct" class="nav-link text-light my-1">Add Product</a></button>
					<button class="admin-button"><a href="index.php?addservice" class="nav-link text-light my-1">Add Service</a></button>
					<button class="admin-button"><a href="index.php?addcategory" class="nav-link text-light my-1">Add Category</a></button>
					<button class="admin-button"><a href="index.php?removeproduct" class="nav-link text-light my-1">Remove Product</a></button>
					<button class="admin-button"><a href="index.php?removeservice" class="nav-link text-light my-1">Remove Service</a></button>
					<button class="admin-button"><a href="index.php?removecategory" class="nav-link text-light my-1">Remove Category</a></button>
					<button class="admin-button"><a href="index.php?viewusers" class="nav-link text-light my-1">View All Users</a></button>
					<button class="admin-button"><a href="index.php?editprofile" class="nav-link text-light my-1">Edit Profile</a></button>
					<button class="admin-button"><a href="index.php?changelogo" class="nav-link text-light my-1">Change Website Logo</a></button><br><br>
				</div>

				
			</div>
		</div>
		</div>	
	</div>

	<!--Add management elements to screen for editing-->
	<div class="my-5 bg-dark">
		<?php
		
			if(isset($_GET['addproduct'])){
				include("addproduct.php");
			}

			if(isset($_GET['addservice'])){
				include("addservice.php");
			}

			if(isset($_GET['addcategory'])){
				include("addcategory.php");
			}

			if(isset($_GET['removeproduct'])){
				include("removeproduct.php");
			}

			if(isset($_GET['removeservice'])){
				include("removeservice.php");
			}

			if(isset($_GET['removecategory'])){
				include("removecategory.php");
			}

			
			if(isset($_GET['calendar'])){
				include("calendar3.php");
			}

			if(isset($_GET['categories'])){
				include("categories.php");
			}

			if(isset($_GET['editprofile'])){
				include("editprofile.php");
			}

			if(isset($_GET['vieworders'])){
				include("vieworders.php");
			}

			if(isset($_GET['changelogo'])){
				include("changelogo.php");
			}

			if(isset($_GET['viewusers'])){
				include("viewusers.php");
			}






		?>
	</div>

	
	</header>


<!--footer-->
	<?php
		include("../footer.php");
	?>

</body>
<footer class="footer">	
			<div class="bg-black text-white p-3 text-center">
			
				<p>© Exotic Pest Control & Cleaning</p>
				<p>Designed By Ashley Charumbira - 2024</p>
			</div>
</footer>


</html>