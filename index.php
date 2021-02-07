<?php
    require_once "./includes/connect.php";
    session_start();

    if(isset($_SESSION['loggedin'])){
        header('location: ./home.php');
        exit;
    }

    //initialise variables
    $usrnm = "";
    $pswd = "";
    
    $usrnmErr = "";
    $pwdErr = "";

    //Check if the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Check if username is empty
        if(empty(trim($_POST['usrnm']))){
            $usrnmErr = 'Please enter your username.';
        } else{
            $username = trim($_POST['usrnm']);
        }

        //Check if password is empty
        if(empty(trim($_POST['pwd']))){
            $pwdErr = 'Please enter your password.';
        } else{
            $pwd = trim($_POST['pwd']);
        }

        //Check if both username and password are empty
        if(empty(trim($_POST['usrnm'])) && empty(trim($_POST['pwd']))){
            $usrnmErr = 'Please enter your username.';
            $pwdErr = 'Please enter your password.';
        } else{
            $usrnm = trim($_POST['usrnm']);
            $pwd = trim($_POST['pwd']);
        }

        //Validate credentials
        if(empty($usrnmErr) && empty($pwdErr)){
            //Prepare a select statement
            $sql = 'SELECT id, usrnm, pwd, usrType FROM users WHERE usrnm = ?';

            if($stmt = mysqli_prepare($conn, $sql)){
                //Bind variables to the prepared statement
                mysqli_stmt_bind_param($stmt, 's', $param_usrnm);

                //Set parameters
                $param_usrnm = $usrnm;

                //Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    //Store result
                    mysqli_stmt_store_result($stmt);

                    //Check if username exists, then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        //Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $usrType);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($pwd, $hashed_password)){
                                //Password is correct, so start a new session
                                session_start();

                                //Store data in session variables
                                $_SESSION['loggedin'] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION['usrnm'] = $usrnm;
                                $_SESSION['usrType'] = $usrType;

                                //Redirect user to home page
                                header('location: ./home.php');
                            } else{
                                //Display an error message if password does not match account password
                                $pwdErr = 'The password you entered does not match you account.';
                            }
                        }
                    } else{
                        //Display an error message if username doesn't exist
                        $usrnmErr = 'No account was found with that username!';
                    }
                } else{
                    echo 'Oops! Something webt wrong. Please try again later.';
                }
            }

            //Close statement
            mysqli_stmt_close($stmt);
        }

        //Close connection
        mysqli_close($conn);
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
                    <input type="checkbox" name="shwPwd" id="shwPwd" onclick="showPw()">
                    <span class="checkmark"></span>
                </label>
                <button type="submit" name="login" id="login">Login</button>
                <a href="#">Reset your password here.</a>

                <a href="./register.php">Create an Account here.</a>
            </form>

        </div>
    </div>

    <script src="./js/scripts.js"></script>
 </body>
 </html>