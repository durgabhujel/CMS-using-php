<?php
include('../server.php');
include('../errors.php');
if(isset($_POST['suscribe_news'])){
    $email = $_POST['email'];
    $em = '';
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql="INSERT INTO news_suscriber(email) VALUES('$email')";
        $result = mysqli_query($db,$sql);
        if($result){
            $em = 'Thank you for suscribing us'; 
            header('Location: http://'.SITE_URL.'/index.php?page=all_news&message='.$em);
        }
    }else{
        $em = 'invalid email'; 
        header('Location: http://'.SITE_URL.'/index.php?page=all_news&message='.$em);

    }
}

?>