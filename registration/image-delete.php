<?php
include 'db.php';
$id = $_GET['id'];
$image_name = $_GET['name'];
$page_id = $_GET['page_id'];
$sql = "DELETE FROM page_image WHERE id=$id";
$result = mysqli_query($db,$sql);
print_r($result);
if($result){
    $unlink = unlink('upload/'.$image_name);
    if($unlink){
        header("location:imagemanager.php?page_id=".$page_id);
    }
}