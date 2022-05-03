
<?php
include('../../server.php');
$suscriber_id =$_GET['id'];
$sql =  "DELETE FROM news_suscriber where id=$suscriber_id";
$result = mysqli_query($db,$sql);
if($result){
    header('location: http://'.SITE_URL.'/admin/index.php?page=news_letter_suscriber');
}