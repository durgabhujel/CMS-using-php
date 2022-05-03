<?php
include('../../server.php');
if (isset($_POST['upload'])){
    $Title = $_POST['title'];
    $footer = $_POST['footer_page'];
    $Description = $_POST['description'];
    $parent_id= $_POST['parent_page'];
    $Image = $_FILES['image'];
    print_r($_FILES['image']);
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    move_uploaded_file($img_loc, '../../uploadImage/'.$img_name);
    $sql ="INSERT INTO image (Title, description,image,parent_id,is_footer_page) VALUES ('$Title','$Description','$img_name','$parent_id','$footer')";
    $result = mysqli_query($db, $sql);
    if($result){
        header('location: http://'.SITE_URL.'/admin/index.php?page=page_manager');
    }
}
if(isset($_POST['order_submit'])){
    $orderby = $_POST['order_by'];
    $orderin = $_POST['order'];
    $sql = "UPDATE in_order SET order_by='$orderby',order_in='$orderin' WHERE id='0'";
    $result = mysqli_query($db, $sql);
    if($result){
        header('location: http://'.SITE_URL.'/admin/index.php?page=page_manager');
    }
}
if(isset($_POST['file_submit'])){
    $name = $_POST['name'];
    $active = $_POST['download_is_active'];
    $filename = $_FILES['myfile']['name'];
    $em = '';
    $error = $_FILES['myfile']['error'];
    if($error==0){

   
        // destination of the file on the server
        $destination = '../assets/downloads/' .$filename;
        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        // the physical file on a temporary uploads directory on the server
        $file_tmp = $_FILES['myfile']['tmp_name'];

        $size = $_FILES['myfile']['size'];

        if (!in_array($extension, ['zip', 'pdf', 'xls','docx','jpg'])) {
            $em = "You file extension must be .zip, .pdf .xls .jpg or .docx";
            header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);
        } elseif ($_FILES['myfile']['size'] > 10240000) { // file shouldn't be larger than 1Megabyte
            $em = "File too large!";
            header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);
        } else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file_tmp, $destination)) {
                $sql = "INSERT INTO download_page (file_name, file, size, is_active, download_count) VALUES ('$name','$filename','$size','$active','0')";
                $result = mysqli_query($db,$sql);
                if($result){
                    $em = "file upload sucessfully";
                    header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);


                }
            }else{
                $em = "Failed to upload file.";
                header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='
                .$em);
                
            }
        }

    }
}
if(isset($_POST['update_file'])){
    $download_id = $_POST['download_id'];
    $name = $_POST['name'];
    $active = $_POST['download_is_active'];
    if(isset($_FILES['myfile']['name']) && !empty($_FILES['myfile']['name'])){
        $filename = $_FILES['myfile']['name'];
        $em = '';
        $error = $_FILES['myfile']['error'];
        if($error==0){


            // destination of the file on the server
            $destination = '../assets/downloads/' . $filename;
            // get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            // the physical file on a temporary uploads directory on the server
            $file_tmp = $_FILES['myfile']['tmp_name'];

            $size = $_FILES['myfile']['size'];

            if (!in_array($extension, ['zip', 'pdf', 'xls','docx','jpg'])) {
                $em = "You file extension must be .zip, .pdf .xls .jpg or .docx";
                header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);
            } elseif ($_FILES['myfile']['size'] > 10240000) { // file shouldn't be larger than 1Megabyte
                $em = "File too large!";
                header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);
            } else {
                // move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($file_tmp, $destination)) {
                    $sql = "UPDATE download_page SET file_name='$name',file='$filename',is_active='$active' WHERE id = '$download_id'";
                    $result = mysqli_query($db,$sql);
                    if($result){
                        $em = "file upload sucessfully";
                        header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);


                    }
                }else{
                    $em = "Failed to upload file.";
                    header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);
                    
                }
            }

        }
    }else{
        $filename1 = $_POST['my_file'];
        $sql = "UPDATE download_page SET file_name='$name',file='$filename1',is_active='$active' WHERE id = '$download_id'";
        $result = mysqli_query($db,$sql);
        if($result){
         $em = "file upload sucessfully";
         header('location: http://'.SITE_URL.'/admin/index.php?page=download_page&error='.$em);


        }


    }
}
