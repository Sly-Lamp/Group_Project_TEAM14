<?php
    require './../includes/connect.php';

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
            <?php
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];

                if(empty($selector) || empty($validator)){
                    echo "Oops! We couldn't validate your request! Please try again later!";
                    exit();
                }else{
                    if(ctype_xdigit($selector) !==false && ctype_xdigit($validator) !==false){
                        ?>
                    <form action="pwdReset.php" method="post" id="pwdResetForm">
                        <h1>Reset Password</h1>
                        <input class="form-control mb-2" type="hidden" name="selector" value="<?php echo $selector; ?>">
                        <input class="form-control mb-2" type="hidden" name="validator" value="<?php echo $validator; ?>">
                        <input class="form-control mb-2" id="pwd" type="password" name="pwd" placeholder="Enter your new passwrod here...">
                        <input class="form-control mb-2" id="pwdconf" type="password" name="pwdconf" placeholder="Confirm your new passwrod here...">
                        <label class="shwPwdCont" for="shwPwd">Show Password
                            <input type="checkbox" name="shwPwd" id="shwPwd" onclick="showPw()">
                            <span class="checkmark"></span>
                        </label>
                        <button class="mb-2 btn btn-success" id="newpwdSubmit" name="newpwdSubmit" type="submit">Create new password</button>
                    </form>

                    <?php
                    }
                }
            ?>
        </div>
    </div>

    <script src="./../js/scripts.js"></script>
</body>
</html>