<?php
    require_once "./includes/connect.php";
    session_start();

    if(isset($_SESSION['loggedin'])){
        header('location: ./home.php');
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jake Salt, Connor Grattan, Kenneth Brown, Thomas Neil, Davide Pisanu, Luis Fernandez-Loaysa">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="login">

            <form action="index.php" method="post" id="loginForm">

                <h1>Login:</h1>

                <label for="usrnm">Username:</label>
                <input type="text" name="usrnm" id="usrnm" placeholder="Username...">

                <label for="pwd">Password:</label>
                <input type="password" name="pwd" id="pwd" placeholder="Password...">

                <label class="shwPwdCont" for="shwPwd">Show Password
                    <input type="checkbox" name="shwPwd" id="shwPwd">
                    <span class="checkmark"></span>
                </label>
                <button type="submit" name="login" id="login">Login</button>
                <a href="#">Reset your password here.</a>

                <a href="./register.php">Create an Account here.</a>
            </form>

        </div>
    </div>
</body>
</html>