<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    }

	echo "<h1 class=\"header\"><i>".$_SESSION['usrnm']."</i>'s Profile:</h1>";
	
	$search = "SELECT * FROM users WHERE usrnm='".$_SESSION['usrnm']."'";
	$result = $conn->query($search);
	echo $search;
	if(!$result)
	{
		die($conn->error);
	}
	else
	{
		$result = $result->fetch_assoc();
	}
	
	echo "<p>Admin Level: ".$result['usrType']."</p>";
	echo "<p>User ID: ".$result['id']."</p>";
	echo "<p>Username: ".$result['usrnm']."</p>";
	echo "<p>First Name: ".$result['fName']."</p>";
	echo "<p>Surname: ".$result['sName']."</p>";
	echo "<p>Email: ".$result['email']."</p>";
	
	#Payment information
	$search = "SELECT * FROM card_details WHERE userID=".$_SESSION['id'];
	$result = $conn->query($search);
	
	echo "<p>Card details: </p>";
	
	if($result->num_rows > 0)
	{
		echo "<ul>";
			while($row = $result->fetch_assoc())
			{
				echo "<li>*************".substr($row['cardNumber'], -3)." | <a href='removecard.php?id=".$row['id']."'>Remove</a></li>";
			}
		echo "</ul>";
	}
	else
	{
		echo "<p>No cards on record.</p>";
	}
	echo "<a href='addCard.php'><button>Add new card</button></a>";
	
	include './includes/footer.php';
?>