<?php

	require_once "./includes/connect.php";
	
	#Base "get all" query for products
	$search = "SELECT * FROM products";
	
	#If a search has been made, append a search filter to the query
	if(isset($_GET['q']))
	{
		$search = $search." WHERE name LIKE '%".$_GET['q']."%'";
	}
	
	#Get every product that matches the given criteria
	$results = $conn->query($search);
	
	if($results->num_rows > 0)
	{
		#Present the results in a table
		echo "<div class='productList'>";
			echo "<div class='row'>";
				echo "<div class='col'>ID</div>";
				echo "<div class='col'>Name</div>";
				echo "<div class='col'>Description</div>";
				echo "<div class='col'>Price</div>";
				echo "<div class='col'>Product Page</div>";
			echo "<div>";
		echo "</div>";
		
		#Iterate through every result, displaying the data in new rows in the table
		while($row = $results->fetch_assoc())
		{
			$price = $row["price"] / 100;
			
			echo "<div class='row'>";
				echo "<div class='col'>".$row["id"]."</div>";
				echo "<div class='col'>".$row["name"]."</div>";
				echo "<div class='col'>".$row["description"]."</div>";
				echo "<div class='col'>£".$price."</div>";
				echo "<div class='col'><a href='product.php?id=".$row["id"]."'>Page</a></div>";
			echo "</div>";
		}
		
		echo "</div>";
	}
	else
	{
		echo "<h1>No results</h1>";
	}
	
	$conn->close();
?>