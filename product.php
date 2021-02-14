<?php

	require_once "./includes/connect.php";
	
	if(isset($_GET['id']))
	{
		$search = "SELECT * FROM products WHERE id=".$_GET['id'];
		
		$results = $conn->query($search);
	
		if($results->num_rows > 0)
		{
			$product = $results->fetch_assoc();
			
			echo "<h1 id='pName'>".$product['name']."</h1>";
			echo "<p id='pDesc'>".$product['description']."</p>";
			echo "<p id='price'>".$product['price']."</p>";
			echo "<img id='picture' src='".$product['imageRef']."'/>";
		}
		else
		{
			echo "<h1>Invalid product ID</h1>";
		}
	}
	else
	{
		header('location: ./products.php');
        exit;
	}
	
	$conn->close();
?>