<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    } elseif($_SESSION['usrType'] < 1 && isset($_SESSION['loggedin'])){
        header('location: home.php');
    } else{
        $sql = 'SELECT * FROM pwdreset';

 ?>
 
        <h1 class="header">Password Reset Data:</h1>

 <?php

        if($result = mysqli_query($conn, $sql)):
            if(mysqli_num_rows($result) > 0):
            ?>

                <table class="orders">
                    <thead>
                        <tr>
                            <th>Reset Id:</th>
                            <th>Email:</th>
                            <th>Selector:</th>
                            <th>Token:</th>
                            <th>Expirey:</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    <?php    
                    while($row = mysqli_fetch_array($result)):
                    ?>
                        <tr>
                            <td><?php echo $row['pwdResetId']; ?></td>
                            <td><?php echo $row['pwdResetEmail']; ?></td>
                            <td><?php echo $row['pwdResetSelector']; ?></td>
                            <td><?php echo $row['pwdResetToken']; ?></td>
                            <td><?php echo $row['pwdResetExpires']; ?></td>
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

