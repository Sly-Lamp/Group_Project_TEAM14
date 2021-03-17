<?php
    require_once './../includes/connect.php';

    if(isset($_SESSION['Loggedin'])){
        header('location:./../home.php');
        exit();
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jake Salt, Connor Grattan, Kenneth Brown, Thomas Neil, Davide Pisanu, Luis Fernandez-Loaysa">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../css/styles.css">
    <script src="./../js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/2de6eea747.js" crossorigin="anonymous"></script>
    <title>Reset Password</title>
</head>
<body>
        <div class="container">
            <div class="pwdReset">
                <form action="resetReq.php" method="post" id="pwdResetForm">
                    <h1>Password Reset</h1>
                    <?php 
                        if(isset($_GET['reset'])){
                            if($_GET['reset'] == 'success'){
                                echo '<div class="success">
                                <p>Please check your email!</p></div>';
                            }
                        }
                    ?>
                    <p>An email containing instructions on how to reset your password will be sent to your account. </p>
                    <input type="email" name="email" id="email" placeholder="Email...">
                    <button name="rstReqSubmit">Reset Password</button>
                </form>
            </div>
        </div>             
    
    <script src=".././js/script.js"></script>
</body>
</html>