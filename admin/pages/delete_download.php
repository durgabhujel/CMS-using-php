
<?php
include('../../server.php');

if(isset($_GET['download_id'])){
    $download_id = $_GET['download_id'];
    $em='';
    $sql1 = "SELECT file FROM download_page WHERE id=$download_id";
    $result1 = mysqli_query($db,$sql1);
    if($result1){
        $row = mysqli_fetch_assoc($result1);
            $filename = $row['file'];
    }
    if (file_exists('../assets/downloads/'.$filename)){
        $unlink=unlink('../assets/downloads/'.$filename);
       
    }else{
        $em="the file is not found!";
        header('location: http://'.SITE_URL.'/admin/index.php?page=download_page'.$em);
    }

 $sql = "DELETE FROM download_page WHERE id = '$download_id'";
 $result = mysqli_query($db,$sql);
 if($result){
        header('location: http://'.SITE_URL.'/admin/index.php?page=download_page');
    }
}else{
    header('location: http://'.SITE_URL.'/admin/index.php?page=download_page');
}