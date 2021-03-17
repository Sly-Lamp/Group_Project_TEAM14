<?php
    require_once './includes/connect.php';
    session_start();

    if(!isset($_SESSION['loggedin'])){
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
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/2de6eea747.js" crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>
    
    <title><?php 
    if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    echo 'Login';
    }
    if (basename($_SERVER['PHP_SELF']) == 'register.php'){
        echo 'Register';
    }
    if (basename($_SERVER['PHP_SELF']) == 'home.php') {
        echo 'Home';
    }
    if (basename($_SERVER['PHP_SELF']) == 'products.php') {
        echo 'Product List';
    }
    if (basename($_SERVER['PHP_SELF']) == 'product.php'){
        echo 'PRODUCT NAME'; //Get name from db
    }
    if (basename($_SERVER['PHP_SELF']) == 'admin.php'){
        echo 'Admin';
    }
    if (basename($_SERVER['PHP_SELF']) == 'admins.php'){
        echo 'Admin List';
    }
    if (basename($_SERVER['PHP_SELF']) == 'orders.php'){
        echo 'Order List';
    }
    if (basename($_SERVER['PHP_SELF']) == 'users.php'){
        echo 'User List';
    }
    if (basename($_SERVER['PHP_SELF']) == 'stock.php'){
        echo 'Stock List';
    }
    ?></title>
</head>
<body>
    <header>
        <!-- <span class="hamburger" onclick="openNav()">&#9776;</span> -->
            <nav>
                <a href="./home.php"><i class="fas fa-home"></i> Home</a>
                <a href="./products.php"><i class="fas fa-apple-alt"></i> Products</a>
                <a href="./profile.php"><i class="fas fa-user-alt"></i> Profile</a>
                <!-- <h1>iFruit</h1> -->
                <object data="./assets/images/logo.svg" image="image/svg" style="width: 200px" href="./home.php">
                    Your browser doesn't support SVG
                </object>
                <a href="./basket.php"><i class="fas fa-shopping-basket"></i> Basket</a>
                <?php 
                    if($_SESSION['usrType'] >= 1): ?>
                        <a href="./admin.php"><i class="fas fa-user-lock"></i> Admin</a>
                <?php endif; ?>
                <a href="./logout.php" class="left"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
    </header>

    <!-- <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <div class="srch">
                <input type="text" placeholder="Search..." class="search">
                <button type="submit" class="srchBtn"><i class="fas fa-search"></i></button>
            </div>
            <a href="./products.php">Products</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
            <?php //if($_SESSION['usrType'] >= 1){
                //echo '<a href="admin.php">Admin</a>';
           // } ?>
        </div>
    </div> -->