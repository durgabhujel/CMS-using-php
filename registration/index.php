<?php
session_start();
$errors = array();
if (!isset($_SESSION["username"])):
    header('location: login.php');
endif;
include "admin-header.php"; 
?>
    <div class="header">
        <h2>Homepage</h2>
    </div>
    
    </div>
    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            
        <?php endif ?>

        <?php if (isset($_SESSION["username"])): ?>
            <p>WEL COME <strong><?php echo $_SESSION["username"]?></strong></p>
            <p><a href="login.php ?logout='1'" style="color: red;">Log Out</a></p>
        <?php endif ?>    
    
    </div>
<?php
include "footer.php";

?>
