<?php
    require './includes/header.php';

    if(!isset($_SESSION['loggedin'])){
        header('location: index.php');
    } elseif($_SESSION['usrType'] < 1 && isset($_SESSION['loggedin'])){
        header('location: home.php');
    } else{
        $sql = 'SELECT * FROM users WHERE usrType >= 1';

 ?>
 
        <h1 class="header">Admins:</h1>

 <?php

        if($result = mysqli_query($conn, $sql)):
            if(mysqli_num_rows($result) > 0):
            ?>

                <table class="orders">
                    <thead>
                        <tr>
                            <th>User Id:</th>
                            <th>Admin Level:</th>
                            <th>Username:</th>
                            <th>First Name:</th>
                            <th>Surname:</th>
                            <th>Email:</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    <?php    
                    while($row = mysqli_fetch_array($result)):
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['usrType']; ?></td>
                            <td><?php echo $row['usrnm']; ?></td>
                            <td><?php echo $row['fName']; ?></td>
                            <td><?php echo $row['sName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
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

