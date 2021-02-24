<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    } elseif($_SESSION['usrType'] < 1 && isset($_SESSION['loggedin'])){
        header('location: home.php');
    }

 ?>
 
    <h1 class="header"><i>Username</i>'s Profile:</h1>

    <p>Admin Level:</p>

    <p>User Id:</p>

    <p>Username:</p>

    <p>First Name:</p>

    <p>Surname:</p>

    <p>Email:</p>


<?php

include './includes/footer.php';

?>