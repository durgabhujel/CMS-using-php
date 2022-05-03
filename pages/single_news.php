<?php 
// include ('../server.php');
$id=$_GET['id'];
$sql = "SELECT * FROM news_page WHERE id=$id";
$result = mysqli_query($db,$sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    {   $news_title = $row['news_title'];
        $news=$row['news_content'];
        $image = $row['image'];
        $image1 = explode(",", $image);
        $posted_date = $row['add_date'];
        ?>
        <section class="news" style="padding: 10px 50px;">
            <div class="news-heading">
                <h1 class="title">
                    <?php echo $news_title ?>
                </h1>
                <h4 class="date">
                    <?php echo "posted in ".$posted_date ?>
                </h4>
            </div>
            <div class="news-image-wrapper">
                <?php
                foreach($image1 as $photo){
                    ?>
                 <img class="news-image" src="./admin/news_image/<?php echo $photo ?>">
                 <?php
                }
                ?>
            </div>
            <div class="news-content">
                <p><?php echo $news ?></p>
            </div>
        </section>
        <?php
    }
}