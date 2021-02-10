<?php

	require_once "./includes/connect.php";
	
	$search = "SELECT * FROM products";
	$results = $conn->query($search);
	
	if($results->num_rows > 0)
	{
		while($row = $results->fetch_assoc())
		{
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br/>" . $row["description"]. "<br/>";
		}
	}
	else
	{
		echo "<h1>No results</h1>";
	}
	
	$conn->close();
?>