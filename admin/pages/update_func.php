<?php
include '../../server.php';

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $Title = $_POST['title'];
    $Description = $_POST['description'];
    $footer = $_POST['footer_page'];
    $Image = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    move_uploaded_file($img_loc, '../../uploadImage/'.$img_name);
    
    $sql = "UPDATE `image` SET Title='$Title',description='$Description',image='$img_name',is_footer_page='$footer' WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    if($result){
        header('location: http://'.SITE_URL.'/admin/index.php?page=page_manager');
    }
}