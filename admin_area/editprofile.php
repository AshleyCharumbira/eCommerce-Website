<?php

    if(isset($_GET['editprofile'])){
        session_start();
        include("../database.php");
        
        $username = $_SESSION['username'];

        $get_user = "SELECT * FROM admin_table WHERE admin_name='$username'";
        $run_user = mysqli_query($mysqli, $get_user);
        $row_user = mysqli_fetch_assoc($run_user);

        $picture = $row_user['picture'];
        $admin_email = $row_user['admin_email'];
        $admin_password = $row_user['admin_password'];

        if(isset($_POST['user_update'])){
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $password_hash = password_hash($_POST["user_password"], PASSWORD_DEFAULT);

        

            if(isset($_FILES['user_image'])){
                $file_name = $_FILES['user_image']['name'];
                $file_tmp =$_FILES['user_image']['tmp_name'];
        
                move_uploaded_file($file_tmp,"profile_pictures/".$file_name);
            }

            $update_user = "UPDATE admin_table SET admin_name='$user_name', admin_email='$user_email', picture='$file_name', admin_password='$password_hash' WHERE admin_id=1234";
            $run_update = mysqli_query($mysqli, $update_user);

            if($run_update){
                echo "<script>alert('Your Profile has been updated successfully')</script>";
                $_SESSION['username'] = $user_name;
                
                echo "<script>window.open('index.php?editprofile','_self')</script>";
            }
        }

    }


?>

<h1 class='text-center' style='color:white; font-size:30px;'>Edit Profile</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" placeholder="Enter new username "<?php echo $username ?>" name="user_name">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  placeholder="Enter new email "<?php echo $admin_email ?>" name="user_email">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  placeholder= "Enter new password"name="user_password">
    </div>
    <div class="form-outline mb-4">

        <div class="form-outline mb-4 text-center">
        <label>Select New Profile Picture: </label>
        <br>
            <input type="file" name="user_image" id="user_image" class="form-control"  style="width:750px; margin: 0 auto;">
            
            <label>Update </label>
           

            <input type="checkbox" name="update_pic" style="width: 120px; color:black; border-radius:50px;">

        </div>
    </div>

    <input type="submit" value="Update Profile" class="form-control w-50 m-auto bg-success py-2 px-3 border-0" name="user_update" style="color:white;">


</form>
    

 
    