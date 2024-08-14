<?php
    include("../database.php");

    if(isset($_POST["removeservice"])){
        $service_name = $_POST["service_name"];

        //checking if product exists:
        $selectall = "SELECT * FROM services WHERE service_name = '$service_name'";
        $selectall_result = mysqli_query($mysqli, $selectall);

        if(mysqli_num_rows($selectall_result) == 0){
            echo '<script>alert("Service does not exist.")</script>';
            return;
        }


        // removing product from database (if it exists):
        $service_query= "DELETE FROM services WHERE service_name = '$service_name'";
        $serv_result = mysqli_query($mysqli, $service_query);


        if($serv_result){
            echo '<script>alert("Service removed successfully!")</script>';
        }
    }
?>

<form action="" method="post" class="admin-form" style="text-align: center;">
    <h1 style="color:white; size:20px">Remove Service</h1><br>

    <!--Drop down with services from database-->  
    <label>Select Service: </label>
    <select class="form-control" name="service_name">
        <?php
            $getall = "SELECT * FROM services";
            $getall_result = mysqli_query($mysqli, $getall);

            while($row = mysqli_fetch_assoc($getall_result)){
                echo "<option value='".$row['service_name']."'>".$row['service_name']."</option>";
            }
        ?>
    </select>

    <div class="input-group w-10 mb-2 m-auto"> 
        <input type="submit" class="bg-success border-0 p-2 my-2" name="removeservice" value="Remove Service">
    </div>

</form>
