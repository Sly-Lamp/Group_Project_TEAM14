<?php

require './includes/header.php';

?>

<div class="container">

    <form class="searchheader" method="POST" action="products.php">
        <input type="text" placeholder="Search..." class="search" name="q"> <!-- easty access search bar for users, with a sort by menu-->
        <button type="submit" class="srchBtn"><i class="fas fa-search"></i></button>
        <select name="sort" class="sort">
            <option value="" selected disabled>Sort By:</option>
            <option value="0" >Relevance</option>
            <option value="1">Price: Low - High</option>
            <option value="2">Price: High - Low</option>
            <option value="3">Star Rating</option>
        </select>
    </form>
</div>
           
    <div class="productLst">
        <div class="row" style="width: 90%; margin: 0 auto;">
            <!-- for products list all, unless there is a specific term where you list all %like% the search term -->

                <?php

                    #Base "get all" query for products
			        $search = "SELECT id, name, imageRef, price FROM products";

                    #If a search has been made, append a search filter to the query
                    if(isset($_POST['q'])){
                        $search = $search." WHERE name LIKE '%".$_POST['q']."%'";
						echo "<h2>You searched for: ".$_POST['q']."</h2>";
                    }

                    #Get every product that matches the given criteria
			        $results = $conn->query($search);
					
					if(!$results)
					{
						#Something has gone wrong with the query
						echo $conn->error;
						die();
					}
					
                    if($results->num_rows > 0): ?>
                         <?php
                        while($row = $results->fetch_assoc()):
                            $price = $row['price'] / 100;
                ?>

       
                            <!-- <div class="row"> -->
                                <div class="col">
                                <a class="itemLink" href="product.php?id=<?php echo $row['id']; ?>">
                                    <div class="items">
                                        <img src="<?php echo $row['imageRef'];?>" alt="PLACEHOLDER">
                                        <p><?php echo $row['name']; ?></p>
                                        <p><?php echo '&pound;'. $price; ?></p>
                                    </div>
                                </a>
                                </div>
                   
                            <!-- </div> -->
                <?php
                        endwhile;
                    else:
                        echo '<h1> No results </h1>';
                    endif;

                    $conn->close();
                ?>
            </div>
        </div>
    </div>  
                        




                <!-- <div class="col">
                    <div class="items"> <!-- Please a link on each item that takes the user to the product page 
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                </div>  
                <div class="row">
                 <div class="col">
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                </div> 
                </div>
                <div class="col">
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                </div> 
                <div class="col">
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                    <div class="items">
                        <img src="./assets/productImages/download.jpg" alt="Product Image" class="img">
                        <p class="name">Product Name</p>
                    </div>
                </div> 
        </div>
    </div>
</div> -->

<?php include './includes/footer.php'; ?>
