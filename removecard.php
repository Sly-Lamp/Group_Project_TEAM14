<?php
	require './includes/header.php';
	
	#Check that card ID is valid, and belongs to the logged in user
	if(!isset($_GET['id']))
	{
		header("location:index.php");
		die;
	}
	
	$sql = "SELECT userID FROM card_details WHERE id=".$_GET['id'];
	$result = $conn->query($sql);
	
	if($result->num_rows == 0)
	{
		header("location:profile.php");
		die;
	}
	
	if($result->fetch_assoc()['userID'] != $_SESSION['id'])
	{
		#Kick user back to index if wrong user
		header("location:index.php");
		die;
	}
	
	#Remove the card from the DB
	$sql = "DELETE FROM card_details WHERE id=".$_GET['id'];
	$conn->query($sql);
	header("location:profile.php");
	
	include './includes/footer.php';
?>