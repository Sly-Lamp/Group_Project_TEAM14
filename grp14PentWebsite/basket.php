<?php

    require './includes/header.php'; 


    // echo 'hello';?>

<div class="container">
    <div class="contents">
        <h1><i class="fas fa-shopping-basket"></i> Basket:</h1>
        <div class="bsktItem">
                <img src="./assets/productImages/download.jpg" alt="ITEM IMG">
                <h3>Apple</h3>
            <select name="quan" id="quan">
                    <option value="0" selected>1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                </select>  
        </div>

        <div class="bsktItem">
            <img src="" alt="ITEM IMG">
            <h3>ITEM NAME</h3>
                <select name="quan" id="quan">
                    <option value="0" selected>1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                </select>
        </div>

        <div class="bsktItem">
            <img src="" alt="ITEM IMG">
            <h3>ITEM NAME</h3>
                <select name="quan" id="quan">
                    <option value="0" selected>1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                </select>
        </div>

        <div class="bsktItem">
            <img src="" alt="ITEM IMG">
            <h3>ITEM NAME</h3>
                <select name="quan" id="quan">
                    <option value="0" selected>1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="5">6</option>
                </select>
        </div>

    </div>

    <a class="checkout" href="checkout.php?somephpthinghere">Check Out</a>  <!-- Send info to checkout.php -->

</div>



    