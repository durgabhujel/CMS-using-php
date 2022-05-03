<?php
if(isset($_POST['upload_image']))
{
    $id = $_POST['id'];
    $Page_id = $_POST['page_id'];
    $image = $_FILES['image'];
    //num of image
    $num_of_image =count($image);
    for ($i=0; $i<$num_of_image; $i++){
        $img_name = $image['name'][$i];
        $tmp_name = $image['tmp_name'][$i];
        $error = $image['error'][$i];

        if ($error===0){
            $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
            //convert to image extension and store it in a variable
            $img_ex_lc = strtolower($img_ext);
            //creating array that store allowed to upload image extesion
            $allowed_exs= array('jpg', 'png','jpeg');
            //checked the if extesion is present in $allowed_exs array
           if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid('IMG-',true).'.'.$img_ex_lc;
                //creating a upload path in root directory
                $img_upload_path ='upload/' .$new_img_name;
                move_uploaded_file($tmp_name, 'upload/'.$new_img_name);
                include 'db.php';
                $sql = "INSERT INTO page_image(page_id, image) VALUES('$Page_id','$new_img_name')";
                $result = mysqli_query($db, $sql);
                if($result){
                    header('location: imagemanager.php');
                }
            }
            else 
            {
                $em = "you canot upload this type of file";
                header("location: imagemanager.php?error=$em");

            }
        }else{
            $em= "unknown error occured while uploading";
            header("location: imagemanager.php?error=$em");
        }


    }
}