<?php

	require_once "./includes/header.php";
	
	#Check if valid ID passed
	if(isset($_GET['id']))
	{
		#Get the product with the given ID
		$search = "SELECT * FROM products WHERE id=".$_GET['id'];
		
		$results = $conn->query($search); ?>

		<div class="container"><?php
	
		if($results->num_rows > 0):
	
			#Only take the first result, if there is for some reason multiple records with the same ID
			$product = $results->fetch_assoc();

			$price = $product['price'] / 100;
		?>

			<!-- #Display product data
			echo "<h1 id='pName'>".$product['name']."</h1>";
			echo "<p id='pDesc'>".$product['description']."</p>";
			echo "<p id='price'>".$product['price']."</p>";
			echo "<img id='picture' src='".$product['imageRef']."'/>"; -->

				<div class="product">
					<div class="row" style="width:100%; margin: 0 auto;">
						<div class="col">
							<img style="width:100%;" src="<?php echo $product['imageRef']; ?>" alt="Placeholder">
						</div>
						<div class="col">
							<h1><?php echo ' '.$product['name']; ?></h1>
							<p>Description:<?php echo ' '.$product['description']; ?></p>
							<p>Price: &pound;<?php echo $price; ?></p>
						</div>
						
					</div>
					
				</div>



		<?php
		
		else:
			#Bad ID passed, present error
			echo "<h1>Invalid product ID</h1>";
		endif;
	}
	else
	{
		#No ID passed, redirect to main products page
		header('location: ./products.php');
        exit;
	}

	
	$conn->close();
?>

</div>