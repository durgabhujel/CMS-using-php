<?php
include('../../server.php');
$id =$_GET['id'];
$sql =  "DELETE FROM news_page where id=$id";
$result = mysqli_query($db,$sql);
if($result){
    header('location: http://'.SITE_URL.'/admin/index.php?page=news_manager');
}

