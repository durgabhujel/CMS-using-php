<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM image where id=$id";
$result = mysqli_query($db, $sql);
if($result){
    header('location:home.php');
}

?>