<?php

require './includes/header.php';

?>

<div class="container">

    <div class="searchheader">
        <input type="text" placeholder="Search..." class="search"> <!-- easty access search bar for users, with a sort by menu-->
        <button type="submit" class="srchBtn">&#128270;</button>
        <select name="sort" class="sort">
            <option value="0" selected>Relevance</option>
            <option value="1">Price: Low - High</option>
            <option value="2">Price: High - Low</option>
            <option value="3">Star Rating</option>
        </select>
        </div>
    </div>

    <div class="row">
        <div class="filters">
           <!-- Umm... Working on it, just give me some time :) -->
        </div>

        <div class="productList">
            <!-- for products list all, unless there is a specific term where you list all %like% the search term -->
            <div class="row">
                <div class="col">
                    <div class="items"> <!-- Please a link on each item that takes the user to the product page-->
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
</div>

<?php include './includes/footer.php'; ?>
