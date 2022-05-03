<?php
include 'db.php';

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $Title = $_POST['title'];
    $Description = $_POST['description'];
    $Image = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    move_uploaded_file($img_loc, 'uploadImage/'.$img_name);
    
    $sql = "UPDATE `image` SET Title='$Title',description='$Description',image='$img_name' WHERE id='$id'";
    echo $sql;
    $result = mysqli_query($db, $sql);
    if($result){
        header("location:home.php");
    }
}


?>