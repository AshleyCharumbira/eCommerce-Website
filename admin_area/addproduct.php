<!--adding ptoducts to the database-->
<?php
    include("../database.php");

    if(isset($_POST["addproduct"])){
        $product_name = $_POST["product_name"];
        $description = $_POST["descriptions"];
        $price = $_POST["product_price"];
        $category_id = $_POST["title"];
        $keywords = $_POST["product_key"];
        $product_status = 'In stock';

        //accessing image:
        $product_image = $_FILES["product_image"]["name"];
        $temp_image = $_FILES["product_image"]["tmp_name"];
        

        //checking if product already exists:
        $selectall = "SELECT * FROM products WHERE product_name = '$product_name'";
        $selectall_result = mysqli_query($mysqli, $selectall);

        if(mysqli_num_rows($selectall_result) > 0){
            echo '<script>alert("Product already exists.")</script>';
            return;
        }

        //adding image to product images folder:
        move_uploaded_file($temp_image, "product_images/$product_image");


        // adding product to database (if it doesn't exist):
        $product_query= "INSERT INTO products (product_name, product_desc, category_id, price, product_image, product_status, key_words) VALUES ('$product_name', '$description', $category_id, $price, '$product_image', '$product_status', '$keywords')";
        $prod_result = mysqli_query($mysqli, $product_query);

        if($prod_result){
            echo '<script>alert("Product added successfully!")</script>';
        }else {
            echo "Error: " . $mysqli->error;
        }
    }
?>

<form action="" method="post" class="admin-form" enctype="multipart/form-data">
    <h1 style="color:white; size:20px">Add Product</h1><br>

    <label>Product Name: </label><br>
    <div class="input-group mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="product_name" placeholder="Product Name" aria-label="Products" aria-describedby="basic-addon1" autocomplete="off" required="required">
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
        <label>Product Description: </label></br>
        <textarea name="descriptions" id="description" cols="100" rows="6" placeholder="Add a description of the product and its purpose." required="required"></textarea>
    </div><br>

    <div>
        <label for="product_image" class="form-label1">Product Image: </label><br>
        <input type="file" name="product_image" id="product_image" class="form-control" required="required">
    </div><br>

    <label>Product Price: </label>
    <div class="input-group mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="product_price" placeholder="R " aria-label="Product price" aria-describedby="basic-addon1" autocomplete="off" required="required">
    </div><br>
    
   <div>
        <label>Key Words: </label></br>
        <textarea name="product_key" id="description" cols="100" rows="3" placeholder="Add a description of the product and its purpose." required="required"></textarea>
    </div><br>


    <div class="input-group w-10 mb-2 m-auto"> 
        <input type="submit" class="bg-success border-0 p-2 my-2" name="addproduct" value="Add Product">
    </div>

</form>
