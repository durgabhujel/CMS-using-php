<form action="pages/add_new_news_func.php" method="post" enctype="multipart/form-data">
   <?php $error_messages = ['image_less_err'=>'you have to upload more than 3 images', 'you canot upload this type of file', 'unknown error occured while uploading'];
      if(isset($_GET['error'])){
         $error_num = $_GET['error'];
         ?>
         <p class='error_message' style="background-color:red; color:#fff; padding:5px;">
            <?php
         if($error_num == 'image_less_err'){
            echo $error_messages['image_less_err'];
         } else if($error_num == '2') {
            echo $error_messages[1];
         } else {
            echo $error_messages[2];
         }
      ?>
      </p>
   <?php } ?>
   <div class="input-group">
      <label for="news_title">News Title</label>
      <input type="text" name="news_title" id="news_title">
   </div>
   <div class="input-group">
      <label for="news_content">News content</label>
      <textarea name="news_content" id="news_content" required></textarea>
   </div>
   <div class="input-group">
      <label for="seo_title">Seo Title</label>
      <input type="text" name="seo_title" id="seo_title">
   </div>
   <div class="input-group">
      <label for="meta_title">Meta title</label>
      <input type="text" name="meta_title" id="meta_title">
   </div>
   <div class="input-group">
      <label for="meta_tags">Meta tag</label>
      <input type="text" name="meta_tags" id="meta_tags">
   </div>
   <div class="input-group">
      <label for="date">Date</label><br>
      <input type="text" name="date" id="date" class="datepicker" placeholder="DD/MM/YYYY">
   </div>
   <div class="input-group">
      <p style="font-size:20px;">Is Active</p>
      <input type="radio" name="is_active" id="yes" value="yes" checked>
      <label for="yes">Yes</label>
      <input type="radio" name="is_active" id="no" value="no">
      <label for="no">No</label>
   </div>
   <div>
      <label for="image">Image</label>
      <input type="file" name="image[]" multiple required>
   </div>
   <div class="input-group">
      <input type="submit" value="upload" name="upload_news">
   </div>
   
</form>
<hr>
<hr>
<div class="table-content">
<table>
   <tr>
    <th scope="col">ID</th>
    <th>News Title</th>
    <th>Seo Title</th>
    <th>Meta Title</th>
    <th>Meta tags</th>
    <th>Is Active</th>
    <th>Actions</th>
   </tr>
   <?php
   $sql = "SELECT * FROM news_page";
   $result = mysqli_query($db,$sql);
   if($result){
      while($row=mysqli_fetch_assoc($result)) 
      {
         $id = $row['id'];
         $newstitle = $row['news_title'];
         $seotitle = $row['seo_title'];
         $metatitle = $row['meta_title'];
         $metatags = $row['meta_tags'];
         $isactive = $row['is_active'];
         ?>
         <tr>
         <td><?php echo $id ?></td>
         <td><?php echo $newstitle ?></td>
         <td><?php echo $seotitle ?></td>
         <td><?php echo $metatitle ?></td>
         <td><?php echo $metatags ?> </td>
         <td><?php echo $isactive ?></td>
         <td>
         <a class="image-delete-btn" href="pages/delete_news.php?id=<?php echo $id  ?>">Delete</a>
         <a href="<?php echo 'http://' . SITE_URL . '/admin/index.php?page=update_news&id=' . $id ?>">Update</a>
         </td>
         </tr>
         <?php
      }
      
        
    

   }
   ?>
</table>
</div>