<?php
    include("../database.php");

    if(isset($_POST["changelogo"])){
    

               //accessing image:
               $logo = $_FILES["logo"]["name"];
               $temp_logo = $_FILES["logo"]["tmp_name"];

        $update_logo = "UPDATE logo_table SET logo = '$logo' WHERE logo_id = 1";
        $update_logo_result = mysqli_query($mysqli, $update_logo);

           //adding image to logo images folder:
           move_uploaded_file($temp_logo, "logo_images/$logo");

        if($update_logo_result){
            echo '<script>alert("Logo changed successfully!")</script>';
        }else {
            echo "Error: " . $mysqli->error;
        }
    }
?>

<form action="" method="post"  enctype="multipart/form-data">
    <h1 style="color:white; size:20px">Change Website Logo</h1><br>

    <label>Logo: </label><br>
    <div class="input-group mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="file" class="form-control" name="logo" placeholder="Logo"  required="required" style="width:500px; margin: 0 auto;">
    </div><br>

    <button type="submit" name="changelogo" class="btn btn-success text-center">Change Logo</button>
</form>