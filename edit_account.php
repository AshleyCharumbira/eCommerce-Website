<?php

    if(isset($_GET['edit_account'])){
        $username = $_SESSION['username'];

        $get_user = "SELECT * FROM user WHERE username = '$username'";
        $result_user = mysqli_query($mysqli, $get_user);
        $row_user = mysqli_fetch_assoc($result_user);
        $user_id = $row_user['user_id'];

        


        $get_user = "SELECT * FROM user WHERE user_id='$user_id'";
        $run_user = mysqli_query($mysqli, $get_user);
        $row_user = mysqli_fetch_assoc($run_user);

        $address = $row_user['user_address'];
        $user_email = $row_user['user_email'];
        $user_mobile = $row_user['user_mobile'];

        if(isset($_POST['user_update'])){
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_address = $_POST['user_address'];
            $user_mobile = $_POST['user_mobile'];

            $update_user = "UPDATE user SET username='$user_name', user_email='$user_email', user_address='$user_address', user_mobile='$user_mobile' WHERE username='$username'";
            $run_update = mysqli_query($mysqli, $update_user);

            if($run_update){
                echo "<script>alert('Your Profile has been updated successfully')</script>";
                $_SESSION['username'] = $user_name;
                
                echo "<script>window.open('profile.php?edit_account','_self')</script>";
            }
        }




    }


?>

<h1 class='text-center' style='color:white; font-size:30px;'>Edit Profile</h1>

<form action="" method="post">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value= "<?php echo $username ?>" name="user_name">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  value= "<?php echo $user_email ?>" name="user_email">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  value= "<?php echo $address ?> "name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  value= "<?php echo $user_mobile ?>" name="user_mobile">
    </div>

    <input type="submit" value="Update Profile" class="form-control w-50 m-auto bg-success py-2 px-3 border-0" name="user_update" style="color:white;">


</form>
    