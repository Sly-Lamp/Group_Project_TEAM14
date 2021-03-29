<?php

require './includes/header.php';

?>

<div class="container">
    <h1><i class="fas fa-home"></i> Home</h1>

    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $text = $_POST['txt'];
            $textErr = "";
            $t = time();
            date_default_timezone_set("Europe/London");
            $updated = date("Y-m-d-H:i:s", $t);

            if(empty(trim($_POST['txt']))){
                $txtErr = "Please enter some content";
            } else{
                $sql = "UPDATE homecontent SET text = ?, updated = ? WHERE id = 1";

                if($stmt = mysqli_prepare($conn, $sql)){
                    mysqli_stmt_bind_param($stmt, 'ss', $param_text, $param_updated);

                    $param_text = $text;
                    $param_updated = $updated;

                    if(mysqli_stmt_execute($stmt)){
                        header('location: home.php?success');
                    } else{
                        echo 'Whoops! Something went wrong!';
                    }

                    // mysqli_stmt_close($stmt);
                }

                // mysqli_close($conn);
            }
    

        }


        $sql = "SELECT * FROM homecontent";

        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo '<p>'.$row['text'].'</p>';

                    if(isset($_SESSION['loggedin']) && $_SESSION['usrType'] >=1){
                        ?>
                        <div class="pay">
                            <form action="home.php" method="post" class="form">
                                <input type="text" name="txt" id="txt" value="<?php echo $row['text']; ?>">
                                <button type="submit">Submit</button>
                            </form>
                        </div> <?php
                    }
                }

                mysqli_free_result($result);
            
            } else{ 
                echo "<p>No records were found.</p>";
            }
    
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }


    ?>
    
</div>

<?php
    include './includes/footer.php';
?>