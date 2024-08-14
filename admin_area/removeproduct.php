<?php
    include("../database.php");

    if(isset($_POST["removeproduct"])){
        $product_name = $_POST["product_name"];

        //checking if product exists:
        $selectall = "SELECT * FROM products WHERE product_name = '$product_name'";
        $selectall_result = mysqli_query($mysqli, $selectall);

        if(mysqli_num_rows($selectall_result) == 0){
            echo '<script>alert("Product does not exist.")</script>';
            return;
        }

        // removing product from database (if it exists):
        $product_query= "DELETE FROM products WHERE product_name = '$product_name'";
        $prod_result = mysqli_query($mysqli, $product_query);


        if($prod_result){
            echo '<script>alert("Product removed successfully!")</script>';
        }
    }
?>



<form action="" method="post" class="admin-form">
    <h1 style="color:white; size:20px">Remove Product</h1><br>

    <label>Select Product: </label>
    <select class="form-control" name="product_name">
        <?php
            $getall = "SELECT * FROM products";
            $getall_result = mysqli_query($mysqli, $getall);

            while($row = mysqli_fetch_assoc($getall_result)){
                echo "<option value='".$row['product_name']."'>".$row['product_name']."</option>";
            }
        ?>
    </select>

    <div class="input-group w-10 mb-2 m-auto"> 
        <input type="submit" class="bg-success border-0 p-2 my-2" name="removeproduct" value="Remove Product">
    </div>

</form>
