<?php
if (isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
}else{
    header('location: http://' . SITE_URL . '/admin/index.php?page=page_manager');
}


?>

    <style>
        .error {
            color:red;
        }
    </style>
    <form action="pages/add_new_image_func.php" method="post" enctype="multipart/form-data">
        <?php
          if (isset($_GET['error'])) {
            echo "<p>";
             echo htmlspecialchars($_GET['error']);
            echo"</p>";
          }
        ?> 
        <div class="container">
            <center><h4>please select picture</h4>
             <label for="page_id">Page_iD</label><br>
             <input type="hidden" name="page_id" value="<?php echo ($page_id) ?>" readonly><br>
                <label >Image</label><br>
                <input type="file" name="image[]" multiple required><br><br>
                <input type="submit" name="upload_image" value="upload">
            </center>

        </div>
    </form>
    <hr>
    <hr>
    <?php
         $sql = "SELECT image,id FROM page_image where page_id=$page_id";
         $result = mysqli_query($db,$sql);
         if($result){ ?>
            <div class="gallery">
            <?php
             while($row=mysqli_fetch_assoc($result)){

                $image =  $row['image'];
                $id = $row['id'];
                ?>
                    <div class="image-card">
                        <img src="../upload/<?php echo $image ?>" class="gallery-image">
                        <a class="image-delete-btn" href="pages/image_delete_func.php?id=<?php echo $id ?>&name=<?php echo $image ?>&page_id=<?php echo $page_id ?>">Delete</a>
                    </div>
        <?php 
         
             }
             ?>
             </div> 
             <?php
            }