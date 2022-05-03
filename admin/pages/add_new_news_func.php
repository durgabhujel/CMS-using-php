<?php
include('../../server.php');
if(isset($_POST['upload_news'])) {
    $newstitle = $_POST['news_title'];
    $newscontent = $_POST['news_content'];
    $seotitle = $_POST['seo_title'];
    $metatitle = $_POST['meta_title'];
    $metatags = $_POST['meta_tags'];
    $adddate = $_POST['date'];
    $isactive = $_POST['is_active'];
    $image = $_FILES['image'];
    $images_names_arr = array();
    $em = '';
    //num of image
    $num_of_image = count($image['name']);
    if($num_of_image < 3){
        $em = "image_less_err";
        header('Location: http://'.SITE_URL.'/admin/index.php?page=news_manager&error='.$em);
    } else {
        for ($i=0; $i<$num_of_image; $i++){
            $img_name = $image['name'][$i];
            $tmp_name = $image['tmp_name'][$i];
            $error = $image['error'][$i];
            if ($error==0){
                $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                //convert to image extension and store it in a variable
                $img_ex_lc = strtolower($img_ext);
                //creating array that store allowed to upload image extesion
                $allowed_exs= array('jpg', 'png','jpeg');
                //checked the if extesion is present in $allowed_exs array
               if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid('IMG-',true).'.'.$img_ex_lc;
                    $image_names_arr[] = $new_img_name;
                    //creating a upload path in root directory
                    move_uploaded_file($tmp_name, '../news_image/'.$new_img_name);
                } else {
                    $em = "2";
                    header('Location: http://'.SITE_URL.'./admin/index.php?page=news_manager&error='.$em);
                }
            } else {
                $em= "3";
                header('Location: http://'.SITE_URL.'./admin/index.php?page=image_manager&error='.$em);
            }
        }
        $image_names_str = implode(",", $image_names_arr);
        $sql = "INSERT INTO news_page(news_title,news_content,seo_title,meta_title,meta_tags,add_date,is_active,image) VALUES('$newstitle','$newscontent','$seotitle','$metatitle','$metatags','$adddate','$isactive','$image_names_str')";
        $result = mysqli_query($db, $sql);
        if($result){
            header('Location: http://'.SITE_URL.'/admin/index.php?page=news_manager');
        }
    }
}