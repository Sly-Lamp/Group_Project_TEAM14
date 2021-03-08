<html>
	<body>
		<?php
			require './includes/header.php';
		?>
		<form action="addCard.php" method="POST">
			Card number: <input type="text" name="cardNumber"/><br/>
			Security code: <input type="text" name="securityCode"/><br/>
			Expiry date: <input type="date" name="expiry"/><br/>
			<input type="submit"/>
		</form>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				#Validate input
				if(!isset($_POST['cardNumber']) or !isset($_POST['securityCode']) or !isset($_POST['expiry']))
				{
					echo "<p>Error: Bad POST request</p>";
					die;
				}
				else
				{
					#Correct variable present, check for correct lengths and characters
					if(strlen($_POST['cardNumber']) != 16 or !is_numeric($_POST['cardNumber']))
					{
						echo "<p>Error: invalid card number.</p>";
						die;
					}
					
					if(strlen($_POST['securityCode']) != 3 or !is_numeric($_POST['securityCode']))
					{
						echo "<p>Error: invalid security code.</p>";
						die;
					}
					
					#If this code is reached, the data should be good to add to the database
				$sql = "INSERT INTO card_details (userID, cardNumber, securityCode, expiry)
						VALUES (".$_SESSION['id'].", ".$_POST['cardNumber'].", ".$_POST['securityCode'].", ".$_POST['expiry'].")";
				}
				
				if (!$conn->query($sql))
				{
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				header("location: profile.php");

			}
			
			include './includes/footer.php';
		?>
	</body>
</html>