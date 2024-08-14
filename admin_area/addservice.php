<!--adding ptoducts to the database-->
<?php
    include("../database.php");

    if(isset($_POST["addservice"])){
        $service_name = strtolower($_POST["service_name"]);
        $description = $_POST["description"];
        $price = $_POST["service_price"];
        $category_id = $_POST["title"];

         //accessing image:
        $service_image = $_FILES["service_image"]["name"];
        $temp_image = $_FILES["service_image"]["tmp_name"];


        //checking if service already exists:
        $getall = "SELECT * FROM services WHERE service_name = '$service_name'";
        $getall_result = mysqli_query($mysqli, $getall);

        if(mysqli_num_rows($getall_result) > 0){
            echo '<script>alert("Service already exists.")</script>';
            return;
        }

         //adding image to service images folder:
         move_uploaded_file($temp_image, "service_images/$service_image");

        // adding service to database (if it doesn't exist):
        $service_query= "INSERT INTO services (service_name, description, category_id, service_image, price) VALUES ('$service_name', '$description', '$category_id', '$service_image', '$price')";
        $serv_result = mysqli_query($mysqli, $service_query);

        if($serv_result){
            echo '<script>alert("Service added successfully!")</script>';
        }{
            echo "Error: " . $mysqli->error;
        }
    }
?>



<form action="" method="post" class="admin-form" enctype="multipart/form-data">
<h1 style="color:white; size:20px">Add Service</h1><br>

    <label>Service Name: </label>
    <div class="input-group  w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="service_name" placeholder="Service Name" aria-label="Services" aria-describedby="basic-addon1" autocomplete="off" required="required">
    </div><br>


    <label>Select Category: </label>
    <select class="form-control" name="title" placeholder="Categories" required="required">
        <?php
            $getall = "SELECT * FROM categories";
            $getall_result = mysqli_query($mysqli, $getall);

            while($row = mysqli_fetch_assoc($getall_result)){
                $title = $row['title'];
                $category_id = $row['category_id'];
                echo "<option value= '$category_id'>$title</option>";
            }
        ?>
    </select><br><br>

    <div>
        <label>Service Description: </label></br>
        <textarea name="description" id="description"  cols="100" rows="6"  placeholder="Add a description of the service." required="required"></textarea>
    </div>

    <div>
        <label for="service_image" class="form-label1">Service Image: </label><br>
        <input type="file" name="service_image" id="service_image" class="form-control" required="required">
    </div><br>

    <label>Price Per Square Meter: </label>
    <div class="input-group mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="service_price" placeholder="R" aria-label="Service price" aria-describedby="basic-addon1" autocomplete="off" required="required">
    </div><br>
    
    <div class="input-group w-10 mb-2 m-auto"> 
        <input type="submit" class="bg-success border-0 p-2 my-2" name="addservice" value="Add Service">
    </div>

</form>