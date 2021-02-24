<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    } elseif($_SESSION['usrType'] < 1 && isset($_SESSION['loggedin'])){
        header('location: home.php');
    } else{
        $sql = 'SELECT * FROM products';

 ?>
 
        <h1 class="header">Stock:</h1>

 <?php

        if($result = mysqli_query($conn, $sql)):
            if(mysqli_num_rows($result) > 0):
            ?>

                <table class="orders" style="margin-bottom: 1em;">
                    <thead>
                        <tr>
                            <th>Item Id:</th>
                            <th>Item Name:</th>
                            <th>Description:</th>
                            <th>Image:</th>
                            <th>Price:</th>
                            <th>Amount:</th>
                            <th>Order:</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    <?php    
                    while($row = mysqli_fetch_array($result)):
                        $price = $row['price'] / 100;
                    ?>
                        
                            <tr>                    
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><img style="width:100px;" src="<?php echo $row['imageRef']; ?>" alt="<?php echo $row['name']; ?>"></td>
                                <td><?php echo '&pound;'.$price; ?></td>
                                <td><?php echo $row['stock']; ?></td>
                                <td>
                                <?php 
                                    echo 
                                        '<select style="width: 40%;" name="sort" class="sort">
                                            <option value="0">0</option>
                                            <option value="1" selected>100</option>
                                            <option value="2">200</option>
                                            <option value="3">500</option>
                                            <option value="4">1000</option>
                                        </select>';
                                ?>
                                </td>
                            </tr>
                                  
<?php

                endwhile;

                mysqli_free_result($result);?>
                </tbody>
                </table>
<?php
            
            else: echo "<p>No records were found.</p>";
            endif; 
        
        else:
                echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        endif;
        
        
    }

    include './includes/footer.php';

?>