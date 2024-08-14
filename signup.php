<?php

session_start();
    if(isset($_POST['sign_up'])) {


    include('database.php');
  

    if (empty($_POST["username"])) {
        die("Name is required");
    }

    if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters long");
    }

    if ( ! preg_match('/[a-z]/i', $_POST["password"])) {
        die("Password must contain at least one letter");
    }

    if ( ! preg_match('/[0-9]/', $_POST["password"])) {
        die("Password must contain at least one digit");
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        die("Passwords do not match");
    }

    $username= $_POST["username"];
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email= $_POST["email"];
    $address= $_POST["user_address"];
    $user_mobile= $_POST["user_mobile"];

    function getIPAddress() {  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }    
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }   
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  


    $user_ip = getIPAddress();


    $sql = "INSERT INTO user (username, user_email, password_hash, user_ip, user_address, user_mobile) VALUES (?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    
    if (!$stmt) {
        die("Error preparing statement: ". $mysqli->error);
    }
    
    $stmt->bind_param("ssssss", $username, $email, $password_hash, $user_ip, $address, $user_mobile);
    $stmt->execute();



    //fetching current user's cart:
    $select_cart_items= "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $cart_items_result = $mysqli->query($select_cart_items);
    $row_count=mysqli_num_rows($cart_items_result);

    if($row_count>0){
        $_SESSION["username"] = $username;
        echo "<script>alert('Signup Succesful! You have items in your cart.')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        $_SESSION["username"] = $username;
        echo "<script>alert('Account created successfully.')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<script src="https://kit.fontawesome.com/3576e9fb10.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="main.css">


</head>

<body class="login">

  
    <div class="login-box" style="height: 800px;" >

        <form action="" method="post" enctype="multipart/form-data">
            <h1>Sign Up</h1>

            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-user" style="color: #1f8018;"></i></span>
                <input type ="text" id="username" name="username" required="required">
                <label>Username</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-envelope" style="color: #1f8018;"></i></span>
                <input type ="email" id="email" name = "email" required="required">
                <label>Email</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-lock" style="color: #1f8018;"></i></span>
                <input type ="password" id="password" name="password" required="required">
                <label>Password</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-lock" style="color: #1f8018;"></i></span>
                <input type ="password" id="confirm_password" name="confirm_password" required="required">
                <label>Confirm Password</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-house" style="color: #1f8018;"></i></span>
                <input type ="text" id="user_address" name="user_address" required="required">
                <label>Address</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-phone" style="color: #1f8018;"></i></span>
                <input type ="text" id="user_mobile" name="user_mobile" required="required">
                <label>Contact</label>
            </div>
            

            <div>
                <button type="submit" name="sign_up" value="sign_up">Sign Up</button>
            </div>

            <div class="register-link">
                <p style="font-size:17px">Already have an account? <a href="login.php"> Login</a></p>
            </div>

        </form>
    </div>

</body>
</html>


