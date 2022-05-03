<?php
include 'db.php';

if (isset($_POST['upload'])){
    $Title = $_POST['title'];
    $Description = $_POST['description'];
    $Image = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    move_uploaded_file($img_loc, 'uploadImage/'.$img_name);
    
    $sql ="INSERT INTO image(Title, description,image) VALUES('$Title','$Description','$img_name')";
    $result = mysqli_query($db, $sql);
    if($result){
        
        
        header('location:home.php');
    }
}



?>