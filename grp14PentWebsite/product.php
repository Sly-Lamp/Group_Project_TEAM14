<?php

	require_once "./includes/connect.php";
	
	#Check if valid ID passed
	if(isset($_GET['id']))
	{
		#Get the product with the given ID
		$search = "SELECT * FROM products WHERE id=".$_GET['id'];
		
		$results = $conn->query($search);
	
		if($results->num_rows > 0)
		{
			#Only take the first result, if there is for some reason multiple records with the same ID
			$product = $results->fetch_assoc();
			
			#Display product data
			echo "<h1 id='pName'>".$product['name']."</h1>";
			echo "<p id='pDesc'>".$product['description']."</p>";
			echo "<p id='price'>".$product['price']."</p>";
			echo "<img id='picture' src='".$product['imageRef']."'/>";
		}
		else
		{
			#Bad ID passed, present error
			echo "<h1>Invalid product ID</h1>";
		}
	}
	else
	{
		#No ID passed, redirect to main products page
		header('location: ./products.php');
        exit;
	}
	
	$conn->close();
?>