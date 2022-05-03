
<?php
$download_id = $_GET['download_id'];
$sql = "SELECT * FROM `download_page` WHERE id = '$download_id'";
$result = mysqli_query($db,$sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    {
        $filename = $row['file_name'];
        $file = $row['file'];
        $is_active = $row['is_active']; 
        $download_id = $row['id'];

    }
}
?>


<div class="main-download">
    <form  class="download-form" action="pages/add_new_page_func.php" method="post"enctype="multipart/form-data">
            <?php
            if(isset($_GET['error'])){?>
                <p class="download-error"><?php echo ($_GET['error']);?></p>
                <?php
            }
            ?>
            <div class="input-group">
                <label for="Name">Document's Name</label>
                <input type="text" name="name" id="Name" required value=<?php echo $filename ?>>
                <label for="file">File</label>
                <p style="color:green; padding-left:10px";>if no file is chosen file will not be changed</p>
                <input type="file" name="myfile" id="file">
                <label for="is_active">Is Active</label>
                <input type="radio" name="download_is_active" id="download_isactive_yes" value="yes" <?Php echo($is_active == 'yes') ? 'checked' : ''?> required>
                <label class="radio" for="download_isactive_yes">Yes</label>
                <input type="radio" name="download_is_active" id="download_isactive_no" value="no" <?php echo ($is_active == 'no') ? 'checked' : '' ?>required>
                <label class="radio" for="download_isactive_no">No</label>
                <input type="hidden" name="download_id" value="<?php echo $download_id ?>" >
                <input type="hidden" name="my_file" value="<?php echo $file ?>">
                <input type="submit" value="upload" name="update_file">
            </div>
    </form>

    
</div>