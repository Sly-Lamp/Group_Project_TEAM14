<?php
    require_once './../includes/connect.php';

    if(isset($_POST['newpwdSubmit'])){

        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $pwd = $_POST['pwd'];
        $pwdConf = $_POST['pwconf'];

        if(empty($pwd) || empty($pwdconf)){
            header('location: ../index.php?newpwd=empty');
            exit();
        } elseif($pwd != $pwdConf){
            header('location:../index.php?newpwd=nomatch');
            exit();
        }

        $currentDate = date("U");

        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo 'Oops! An error occurred. Please try again later!';
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
                echo 'Oops! An error occurred! Please re-submit your reset request!';
                exit();
            } else{

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if($tokenCheck == false){
                    echo 'Oops! An error occurred! Please try again later!';
                    exit();
                } elseif($tokenCheck == true){
                    
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM users WHERE email =?;";
                    $stmt = mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo 'Oops! An error occurred. Please try again later!';
                        exit();
                    } else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo 'Oops! An error occurred! Please try again later!';
                            exit();
                        } else{
                            
                            $sql = "UPDATE users SET password=? WHERE email=?";
                            $stmt = mysqli_stmt_init($con);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo 'Oops! An error occurred. Please try again later!';
                                exit();
                            } else{
                                $newpwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newpwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                                $stmt = mysqli_stmt_init($con);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo 'Oops! An error occurred. Please try again later!';
                                    exit();
                                } else{
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header('location: ../login.php?newpwd=pwdupdated');
                                }


                            }


                        }
                    }

                }

            }
        }


    } else{
        header('location: ../index.php');
        exit();
    }