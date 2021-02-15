<?php
    require_once './includes/connect.php';
    session_start();

    if(!isset($_SESSION['loggedin'])){
        header('location: ./index.php');
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
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./js/scripts.js"></script>
    <title>Login</title>
</head>
<body>
    <header>
        <span class="hamburger" onclick="openNav()">&#9776;</span>
            <nav>
                <a href="./home.php">Home</a>
                <a href="">link</a>
                <h1>LOGO/NAME</h1>
                <a href="">link</a>
                <a href="./logout.php">Logout</a>
            </nav>
    </header>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <div class="srch">
                <input type="text" placeholder="Search..." class="search">
                <button type="submit" class="srchBtn">&#128270;</button>
            </div>
            <a href="./products.php">Products</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
            <?php if($_SESSION['usrType'] >= 1){
                echo '<a href="admin.php">Admin</a>';
            } ?>
        </div>
    </div>