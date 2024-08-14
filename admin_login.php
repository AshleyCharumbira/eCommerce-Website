<?php
    include('database.php');
    include('common_function.php');

    $invalid = false;

    if(isset($_POST['user_login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = sprintf("SELECT * FROM admin_table WHERE admin_email = '%s'", $mysqli->real_escape_string($email));
        $result = $mysqli->query($sql); 
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["admin_password"])) { 
            session_start();

        $_SESSION["username"] = $user["admin_name"];
        header("Location: admin_area/index.php");
        exit();
        }

        $invalid = true;
    }   

?>


<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<script src="https://kit.fontawesome.com/3576e9fb10.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="main.css">
</head>

<body class="login">

  
    <div class="login-box">

        <form action="" method="post">

            <h1>Login</h1>
            


            <?php if ($invalid): ?>
                <br>
              <div class="error" style="color:red;">Invalid email or password</div>
            <?php endif; ?>

            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-envelope" style="color: #1f8018;"></i></span>
                <input type ="email" id="email" name="email" required>
                <label>Email</label>
            </div>
            <div class = "input-box">
                <span class="icon"><i class="fa-solid fa-lock" style="color: #1f8018;"></i></span>
                <input type ="password" id="password" name="password" required>
                <label>Password</label>
            </div>

            <br>
  

            <div>
                <button type="submit" name="user_login" value="user_login">Login</button>
            </div>
                
    

        </form>
    </div>

</body>
</html>




