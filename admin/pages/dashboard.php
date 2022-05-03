<?php
    if(isset($_SESSION['username'])){
        echo "<h1>Welcome " . $_SESSION['username']. "</h1>";
    } else {
        header('Location: ./login.php');
    }