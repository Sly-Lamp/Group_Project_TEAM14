<?php

    require './includes/header.php';

     if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    }

?>

<div class="container">

    <div class="pay">
    
    <h1><i class="fas fa-credit-card"></i> Pay:</h1>

    <div class="login" style="align-items: flex-start;">

        <form action="" method="loginForm" id="loginForm">

            <label for="fName">First Name:</label>
            <input type="text" name="fName" id="fName" placeholder="First Name..." >

            <label for="sName"> Surname:</label>
            <input type="text" name="sName" id="sName" placeholder=" Surname..." >

            <label for="email"> Email:</label>
            <input type="email" name="email" id="email" placeholder=" Email..." >

            <label for="a1">Address Line One:</label>
            <input type="text" name="a1" id="a1" placeholder="Address Line One..." >

            <label for="a1">Address Line Two:</label>
            <input type="text" name="a2" id="a2" placeholder="Address Line Two..." >

            <label for="tc">Town/City:</label>
            <input type="text" name="tc" id="tc" placeholder="Town/City..." >

            <label for="tc">Postcode:</label>
            <input type="text" name="pc" id="pc" placeholder="Postcode..." >
			
			<?php
				$sql = "SELECT * FROM card_details WHERE userID = ".$_SESSION['id'];
				$results = $conn->query($sql);
				
				if(!$results)
				{
					#Error
					die("SQL Error: ".$conn-error);
				}
				
				if($results->num_rows > 0)
				{
					echo 	"<label for='card'>Select a card to pay with:</label>
							<select name='card'>";
					
					while($row = $results->fetch_assoc())
					{
						echo "<option value='".$row['id']."'>".$row['cardNumber']."</option>";
					}
					
					echo "</select>";
				}
				else
				{
					echo 	"<label for='cName'>Name on card:</label>
							<input type='text' name='cName' id='cName' placeholder='Name on Card...' >

							<label for='exp'>Expiry:</label>
							<input type='date' name='exp' id='exp' placeholder='Expiry...' >

							<label for='exp'>Card No:</label>
							<input type='text' name='cNo' id='cNo' placeholder='Card No...' >

							<label for='exp'>Sort Code:</label>
							<input type='text' name='sCode' id='sCode' placeholder='Sort Code...' >

							<label for='exp'>CVV:</label>
							<input type='text' name='cvv' id='cvv' placeholder='CVV...' >";
				}
			?>
            

            <button type="submit" name="payNow" id="payNow">Pay Now</button>

            </form>
        </div>
    </div>

</div>
</div>

<script src="./js/scripts.js"></script>