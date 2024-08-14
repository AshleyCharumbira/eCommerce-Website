<?php
    include("../database.php");

    if(isset($_POST["addcategory"])){
        $category_name = $_POST["cat_name"];

        //checking if category already exists:
        $getall = "SELECT * FROM categories WHERE title = '$category_name'";
        $getall_result = mysqli_query($mysqli, $getall);

        if(mysqli_num_rows($getall_result) > 0){
            echo '<script>alert("Category already exists.")</script>';
            return;
        }


        // adding category to database (if it doesn't exist):
        $insert_query= "INSERT INTO categories (title) VALUES ('$category_name')";
        $result = mysqli_query($mysqli, $insert_query);

        if($result){
            echo '<script>alert("Category added successfully!")</script>';
        }
    }
?>


<form action="" method="post" class="admin-form">

    <h1 style="color:white; size: 15px;">Add Category</h1><br>
    <div class="input-group  w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_name" placeholder="Insert Category" aria-label="Categories" aria-describedby="basic-addon1" autocomplete="off" required="required">
    </div>

    <div class="input-group w-10 mb-2 m-auto">

      <input type="submit" class="bg-success border-0 p-2 my-2" name="addcategory" value="Add Category">
    </div>

</form>