<?php
    require_once './../includes/connect.php';
    session_start();

    if(!isset($_SESSION['loggedin'])){
        header('location: ./../home.php');
        exit;
    }

    $token = "";
    $token = $_POST['tkn'];


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
    <title>Bin 2 Hex</title>
</head>
<body>
    <header>
            <nav>
                <a href="./../home.php"><i class="fas fa-home"></i> Home</a>
                <a href="./../products.php"><i class="fas fa-apple-alt"></i> Products</a>
                <a href="./../profile.php"><i class="fas fa-user-alt"></i> Profile</a>
                <object data="./../assets/images/logo.svg" image="image/svg" style="width: 200px">
                    Your browser doesn't support SVG
                </object>
                <a href="./../basket.php"><i class="fas fa-shopping-basket"></i> Basket</a>
                <?php 
                    if($_SESSION['usrType'] >= 1): ?>
                        <a href="./../admin.php"><i class="fas fa-user-lock"></i> Admin</a>
                <?php endif; ?>
                <a href="./../logout.php" class="left"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
    </header>

    <div class="container">
        <div class="bin2hex">
            <form action="bin2hex.php" method="post" class="form">
                <h1>Bin To Hex</h1>
                <label for="tkn">Password Reset Token</label>
                <input type="text" name="tkn" id="tkn" placeholder="Password Reset Token...">

                <label for="rslt">Result:</label>
                <p name="rslt" id="rslt"><?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ echo bin2hex($token); } else { echo 'Result...'; }?> </p>
                <button>Submit</button>
            </form>
        </div>
    </div>

    
<?php
    require './../includes/footer.php';
?>