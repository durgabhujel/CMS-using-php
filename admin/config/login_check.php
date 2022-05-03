<?php 
if(!isset($_SESSION['username'])){
    header("Location: ".SITEURL."admin/login.php");
}