<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM image where id = $id";
    $result = mysqli_query($db, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);{
            $Title = $row['Title'];
            $description = $row['description'];
            $image = $row['image'];
            $footer = $row['is_footer_page'];
            $order_by = $row['order_by'];
            $in_order = $row['order_in'];
        }
    }
    ?>
    <form action="pages/update_func.php" method="post" enctype="multipart/form-data">
        <center>
            <div class="main">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title" value="<?php echo $Title ?>" required><br>
                <label for="description">Description</label><br>
                <textarea class="ck-editor-field" name="description" id="description" required><?php echo $description ?></textarea>
                <label for="image">Image</label><br>
                <input type="file" name="image" id="image" value="<?php echo $image ?>"required>
                <div class="footer-page">
                    <label for="footer-page">Footer page</label>
                    <input type="checkbox" name="footer_page" id="footer_page">
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                <input type="submit" name="update" value="update">
            </div>
        </center>
        <hr>
        <hr>
        


    </form>