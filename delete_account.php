<?php

    $username = $_SESSION['username'];

    $get_user = "SELECT * FROM user WHERE username = '$username'";
    $result_user = mysqli_query($mysqli, $get_user);
    $row_user = mysqli_fetch_assoc($result_user);
    $user_id = $row_user['user_id'];


    if(isset($_POST['delete_account'])){
        $delete_user = "DELETE FROM user WHERE user_id = '$user_id'";
        $result_delete_user = mysqli_query($mysqli, $delete_user);
        if($result_delete_user){
            echo "<script>alert('Your account has been deleted successfully')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";
        }
    }
?>


<form action="" method="post">
    <br><br>
    <h2 style="font-size: 30px;">Are you sure you want to delete your account?</h2>
    <br>
    <div style="text-align: center;">
        <input type="submit" name="delete_account" value="Delete Account" class="form-control" style="width: 150px; margin: 0 auto;">
    </div>
    </div>
</form>