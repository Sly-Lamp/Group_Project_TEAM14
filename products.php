<?php

	require_once "./includes/connect.php";
	
	$search = "SELECT * FROM products";
	
	if(isset($_GET['q']))
	{
		$search = $search." WHERE name LIKE '%".$_GET['q']."%'";
	}
	
	$results = $conn->query($search);
	
	if($results->num_rows > 0)
	{
		echo "<table>";
		
		echo "<tr>";
		echo "<td>ID</td>";
		echo "<td>Name</td>";
		echo "<td>Description</td>";
		echo "<td>Price</td>";
		echo "<td>Product Page</td>";
		echo "</tr>";
		
		while($row = $results->fetch_assoc())
		{
			$price = $row["price"] / 100;
			
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["description"]."</td>";
			echo "<td>£".$price."</td>";
			echo "<td><a href='product.php?id=".$row["id"]."'>Page</a></td>";
			echo "</tr>";
		}
		
		echo "</table>";
	}
	else
	{
		echo "<h1>No results</h1>";
	}
	
	$conn->close();
?>