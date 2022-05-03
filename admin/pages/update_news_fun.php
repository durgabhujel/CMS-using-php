<?php
include '../../server.php';

if(isset($_POST['update_news'])){
    $id = $_POST['news_id'];
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];
    $seo_title = $_POST['seo_title'];
    $meta_title = $_POST['meta_title'];
    $meta_tags = $_POST['meta_tags'];
    $isactive = $_POST['is_active'];

    $sql = "UPDATE news_page SET news_title='$news_title',news_content='$news_content',seo_title='$seo_title',meta_title='$meta_title',meta_tags='$meta_tags',is_active='$isactive' WHERE id='$id'";
    $result = mysqli_query($db,$sql);
    if($result){
        header('location: http://'.SITE_URL.'/admin/index.php?page=news_manager');
    }
}