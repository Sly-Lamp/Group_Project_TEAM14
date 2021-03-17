<?php
    require './../includes/connect.php';

    if(isset($_POST['rstReqSubmit'])){

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "localhost/grp14PentWebsite/pwdReset/newpwd.php?selector=".$selector."&validator=".bin2hex($token);

        $expires = date("U") + 1800;

        $usrEmail = $_POST['email'];

        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo 'Oops! An error occurred. Please try again later!';
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "s", $usrEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo 'Oops! An error occurred. Please try again later!';
            exit();
        } else{
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $usrEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $to = $usrEmail;

        $subject = 'Password Reset - iFruit';

        $message = '<p>We received a password reset request for your account, if this was you please click the link below. If it was not the you can ignore this email.</p>';
        $message .= '<p>Here is your password reset link: </br>';
        $message .= '<a href="'.$url.'">'.$url.'</a></p>';

        $headers = "From: iFruit <ifruitgrp@gmail.com>\r\n";
        $headers .= "Reply-To: ifruitgrp@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header('location: ./resetPwd.php?reset=success');


    } else{
        header('location: ../index.php');
        exit();
    }