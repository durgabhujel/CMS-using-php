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
                <input type="text" name="name" id="Name" required>
                <label for="file">File</label>
                <input type="file" name="myfile" id="file" required>
                <label for="is_active">Is Active</label>
                <input type="radio" name="download_is_active" id="download_isactive_yes" value="yes" required>
                <label class="radio" for="download_isactive_yes">Yes</label>
                <input type="radio" name="download_is_active" id="download_isactive_no" value="no" required>
                <label class="radio" for="download_isactive_no">No</label>
                <input type="submit" value="upload" name="file_submit">
            </div>
    </form>

    
</div>
<hr>
    <hr>
    <div class="download-table">
        <table class="download-show-table">
            <tr>
                <th scope="col">ID</th>
                <th>Filename</th>
                <th>file</th>
                <th>size(in k.B)</th>
                <th>is active</th>
                <th> Download count </th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM download_page";
            $result = mysqli_query($db,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $download_id = $row['id'];
                    $file_name = $row['file_name'];
                    $file = $row['file'];
                    $size = $row['size'];
                    $is_active = $row['is_active'];
                    $download_count = $row['download_count'];
                    ?>
                        <tr>
                    
                            <td><?php echo $download_id ?></td>  
                            <td><?php echo $file_name ?></td>
                            <td><?php echo $file ?></td>
                            <td> <?php echo $size ?></td>
                            <td><?php echo $is_active ?></td>
                            <td><?php echo $download_count ?></td>
                            <td>
                            <a class="image-delete-btn" href="pages/delete_download.php?download_id=<?php  echo $download_id ?>&filename=<?php echo $file ?>"><i class="fa-solid fa-trash-can icon"></i></a>
                            <a href="<?php echo 'http://' . SITE_URL . '/admin/index.php?page=update_download_page&download_id=' . $download_id ?>"><i class="fa-solid fa-pen-to-square icon"></i></a>
                            
                            </td>
                        </tr> 
                        <?php
                }
            }
            ?>  
        </table>
    </div>