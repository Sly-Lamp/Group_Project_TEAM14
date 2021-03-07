<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    }

	echo "<h1 class=\"header\"><i>".$_SESSION['usrnm']."</i>'s Profile:</h1>";
	
	$search = "SELECT * FROM users WHERE id=".$_SESSION['id'];
	$result = $conn->query($search)->fetch_assoc();
	
	echo "<p>Admin Level: ".$result['usrType']."</p>";
	echo "<p>User ID: ".$result['id']."</p>";
	echo "<p>Username: ".$result['usrnm']."</p>";
	echo "<p>First Name: ".$result['fName']."</p>";
	echo "<p>Surname: ".$result['sName']."</p>";
	echo "<p>Email: ".$result['email']."</p>";

	include './includes/footer.php';
?>