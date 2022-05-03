<?php
$id = $_GET['id'];
$sql="SELECT * FROM `news_page` WHERE id = $id";
$result=mysqli_query($db,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
    {
        $news_title=$row['news_title'];
        $news_content = $row['news_content'];
        $seo_title = $row['seo_title'];
       $meta_title = $row['meta_title'];
       $meta_tags = $row['meta_tags'];
       $is_active = $row['is_active'];
    }
}
?>

<form action="pages/update_news_fun.php" method="post">
   <input type="hidden" name="news_id" value="<?php echo $id; ?>">
  <div class="input-group">
      <label for="news_title">News Title</label>
      <input type="text" name="news_title" id="news_title" value="<?php echo $news_title ?>">
      <div class="input-group">
    <label for="news_content">News content</label>
      <textarea class="ck-editor-field" name="news_content" id="news_content"><?php echo $news_content ?></textarea>
   </div>
   </div>
   <div class="input-group">
      <label for="seo_title">Seo Title</label>
      <input type="text" name="seo_title" id="seo-title" value="<?php echo $seo_title ?>">
   </div>
   <div class="input-group">
      <label for="meta_title">Meta title</label>
      <input type="text" name="meta_title" id="meta_title" value="<?php echo $meta_title ?>">
   </div>
   <div class="input-group">
      <label for="meta_tags">Meta tag</label>
      <input type="text" name="meta_tags" id="meta_tags" value="<?php echo $meta_tags ?>">
   </div>
   <div class="input-group">
      <p style="font-size:20px;font-weight:bold;">Is Active</p>
      <input type="radio" name="is_active" id="yes" value="yes" <?php echo ($is_active == 'yes') ? 'checked' : '' ?>>
      <label for="yes">Yes</label><br>
      <input type="radio" name="is_active" id="no" value="no" <?php echo ($is_active == 'no') ? 'checked' : '' ?> >
      <label for="no">No</label>
    </div>
    <div class="submit_btn">
       <input type="submit" value="update" name="update_news">
   </div>

</form>