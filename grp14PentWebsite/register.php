<?php
    //Connect to db and start session
    require_once "./includes/connect.php";
    session_start();

    //check if user is logged in and relocate them to home page.
    if(isset($_SESSION['loggedin'])){
        header('location: ./home.php');
        exit;
    }

    //initialise variables
    $usrnm = "";
    $email = "";
    $fName = "";
    $sName = "";
    $pwd = "";
    $confpwd = "";

    $usrnmErr = "";
    $emailErr = "";
    $fNameErr = "";
    $sNameErr = "";
    $pwdErr = "";
    $confpwdErr = "";

    //Check if form is submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //check if username is empty
        if(empty(trim($_POST['usrnm']))){
            $usrnmErr = "Please enter a username";
        } else{
            //Prepare a select statement
            $sql = 'SELECT id FROM users WHERE usrnm = ?';

            if($stmt = mysqli_prepare($conn, $sql)){
                //Bind variables tp the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, 's', $param_usrnm);

                //Set parameters
                $param_usrnm = trim($_POST['usrnm']);

                //Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    //Store result
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $usrnmErr = 'This username is already taken.';
                    } else{
                        $usrnm = trim($_POST['usrnm']);
                    }
                } else{
                    echo 'Oops! Something went wrong. Please try again later.';
                }
            }
            
            //Close statement
            mysqli_stmt_close($stmt);
        }

        //Validate First Name
        if(empty(trim($_POST['fName']))){
            $fNameErr = 'Please enter your first name';
        } else{
            $fName = trim($_POST['fName']);
        }

        //Validate Surname
        if(empty(trim($_POST['sName']))){
            $sNameErr = 'Please enter your Surname';
        } else{
            $sName = trim($_POST['sName']);
        }

        //Validate Email
        if(empty(trim($_POST['email']))){
            $emailErr = 'Please enter your Email Address.';
        } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $emailErr = "Please enter a valid Email Address.";
        } else{
            $email = trim($_POST['email']);
        }

        //Validate password
        if(empty(trim($_POST['pwd']))){
            $pwdErr = 'Please enter a password.';
        } elseif(strlen(trim($_POST['pwd'])) < 8){
            $pwdErr = 'Your password must have at least 8 characters.';
        } else{
            $pwd = trim($_POST['pwd']);
        }

        //Validate confirm password
        if(empty(trim($_POST['confpwd']))){
            $confpwdErr = 'Please confirm your password.';
        } else{
            $confpwd = trim($_POST['confpwd']);
            if(empty($pwdErr) && ($pwd != $confpwd)){
                $confpwdErr = "Passwords did not match.";
            }
        }

        //Check input errors before inserting into database
        if(empty($usrnmErr) && empty($fnameErr) && empty($sNameErr) && empty($emailErr) && empty($pwdErr) && empty($confpwdErr)){

        
            //Prepare an insert statement
            $sql = 'INSERT INTO users (usrnm, fName, sName, email, pwd) VALUES (?, ? ,? ,?, ?)';

            if($stmt = mysqli_prepare($conn, $sql)){
                //Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, 'sssss', $param_usrnm, $param_fName, $param_sName, $param_email, $param_pwd);

                //Set parameters
                $param_usrnm = $usrnm;
                $param_fName = $fName;
                $param_sName = $sName;
                $param_email = $email;
                $param_pwd = password_hash($pwd, PASSWORD_DEFAULT);

                //Attempt to execute to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    //redirect user to home page
                    header('location: home.php');
                } else{
                    echo 'Something went wrong. Please try again later.';
                }
                //Close statement
                mysqli_stmt_close($stmt);
            }

            
              //Close connection
            mysqli_close($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jake Salt, Connor Grattan, Kenneth Brown, Thomas Neil, Davide Pisanu, Luis Fernandez-Loaysa">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,700&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>

    <div class="container">
        <div class="login">

            <form action="register.php" method="post" id="loginForm">

                <h1>Sign up:</h1>
                <?php if(!empty($usrnmErr)){ echo '<p class="err">'.$usrnmErr.'</p>';} ?>
                <label for="usrnm">Username:</label>
                <input type="text" name="usrnm" id="usrnm" placeholder="Username..." >

                <?php if(!empty($fNameErr)){ echo '<p class="err">'.$fNameErr.'</p>';} ?>
                <label for="fName">First Name:</label>
                <input type="text" name="fName" id="fName" placeholder="First Name..." >

                <?php if(!empty($sNameErr)){ echo '<p class="err">'.$sNameErr.'</p>';} ?>
                <label for="sName"> Surname:</label>
                <input type="text" name="sName" id="sName" placeholder=" Surname..." >

                <?php if(!empty($emailErr)){ echo '<p class="err">'.$emailErr.'</p>';} ?>
                <label for="email"> Email:</label>
                <input type="email" name="email" id="email" placeholder=" Email..." >

                <?php if(!empty($pwdErr)){ echo '<p class="err">'.$pwdErr.'</p>';} ?>
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" id="pwd" placeholder="Password..." >

                <?php if(!empty($confpwdErr)){ echo '<p class="err">'.$confpwdErr.'</p>';} ?>
                <label for="confpwd">Confirm Password:</label>
                <input type="password" name="confpwd" id="confpwd" placeholder="Confirm your password..." >

                <button type="submit" name="login" id="login">Login</button>

                <a href="./index.php">Already have an account? Sign in here!</a>
            </form>

        </div>
    </div>
</body>
</html>