<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    } elseif($_SESSION['usrType'] < 1 && isset($_SESSION['loggedin'])){
        header('location: home.php');
    } else{
        $sql = 'SELECT * FROM orders';

 ?>
 
        <h1 class="header">Orders:</h1>

 <?php

        if($result = mysqli_query($conn, $sql)):
            if(mysqli_num_rows($result) > 0):
            ?>

                <table class="orders">
                    <thead>
                        <tr>
                            <th>Order No:</th>
                            <th>Order Date:</th>
                            <th>Customer Name:</th>
                            <th>Item Name:</th>
                            <th>Item No:</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    <?php    
                    while($row = mysqli_fetch_array($result)):
                    ?>
                        <tr>
                            <td><?php echo $row['orderId']; ?></td>
                            <td><?php echo$row['orderDate']; ?></td>
                            <td><?php echo$row['usrnm']; ?></td>
                            <td><?php echo$row['itemName']; ?></td>
                            <td><?php echo$row['itemId']; ?></td>
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

?>

