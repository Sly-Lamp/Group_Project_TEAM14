<?php
    include './includes/header.php';
?>

    <div class="container">
        <div class="admrow">
            <div class="admcol">
                <div class="items">
                    <a href="./orders.php"><h1><i class="fas fa-cash-register"></i> Orders</h1></a>
                </div>
                <div class="items">
                    <a href="./users.php"><h1><i class="fas fa-users"></i> Users</h1></a>
                </div>
            </div>
            <div class="admcol">
                <div class="items">
                    <a href="./stock.php"><h1><i class="fas fa-list-ul"></i> Stock</h1></a>
                </div>
                <div class="items">
                    <a href="./admins.php"><h1><i class="fas fa-user-lock"></i> Admins</h1></a>
                </div>
            </div>
            <div class="admcol">
                <div class="items">
                    <a href="./resetpwddata.php"><h1><i class="fas fa-unlock-alt"></i> Password Reset Data</h1></a>
                </div>
            </div>
            <div class="admcol">
                <div class="items">
                    <a href="./pwdReset/bin2hex.php"><h1><i class="fas fa-key"></i> Bin 2 Hex</h1></a>
                </div>
            </div>
        </div>
    </div>

    <?php
        include './includes/footer.php';
    ?>