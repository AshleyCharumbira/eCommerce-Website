<?php
    include("../database.php");

    if(isset($_POST["removecategory"])){
        $category_name = $_POST["cat_name"];

        //checking if category exists:
        $selectall = "SELECT * FROM categories WHERE title = '$category_name'";
        $selectall_result = mysqli_query($mysqli, $selectall);

        if(mysqli_num_rows($selectall_result) == 0){
            echo '<script>alert("Category does not exist.")</script>';
            return;
        }


        // removing category from database (if it exists):
        $cat_query= "DELETE FROM categories WHERE title = '$category_name'";
        $prod_result = mysqli_query($mysqli, $cat_query);


        if($prod_result){
            echo '<script>alert("Category removed successfully!")</script>';
        }
    }
?>



<form action="" method="post" class="admin-form">
    <h1 style="color:white; size:20px">Remove Category</h1><br>


    <label>Select Category: </label>
    <select class="form-control" name="cat_name">
        <?php
            $getall = "SELECT * FROM categories";
            $getall_result = mysqli_query($mysqli, $getall);

            while($row = mysqli_fetch_assoc($getall_result)){
                echo "<option value='".$row['title']."'>".$row['title']."</option>";
            }
        ?>
    </select>


    <div class="input-group w-10 mb-2 m-auto"> 
        <input type="submit" class="bg-success border-0 p-2 my-2" name="removecategory" value="Remove Category"  autocomplete="off" required="required">
    </div>

</form>
