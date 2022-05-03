    <form action="pages/add_new_page_func.php" method="post" enctype="multipart/form-data">
    
        <div class="main">
            <div class="input-group">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title"required><br>
                <label for="description">Description</label><br>
                <textarea class="ck-editor-field" name="description" id="description" required></textarea>
                <label for="image">Image</label><br>
                <input type="file" name="image" id="image"required><br>
                <div class="footer-page">
                    <label for="footer-page">Footer page</label>
                    <input type="checkbox" name="footer_page" id="footer_page">
                </div>
                <label for="parent_page">Parent Page</label>
                <select name="parent_page" id="parent_page">
                    <option value="-1">Top Page</option>
                    <?php
                        $sql = "SELECT * FROM image Where parent_id='-1'";
                        $result = mysqli_query($db,$sql);
                        if($result){
                            echo 'in result';
                            while($row=mysqli_fetch_assoc($result)){
                                echo "in while";
                                $page_id=$row['id'];
                                $page_title = $row['Title'];
                                ?>
                                <option value="<?php echo $page_id; ?>"><?php echo $page_title; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                <input type="submit" name="upload" value="upload">
            </div>
        </div>
        <hr>
        <hr>
        


    </form>
    <?php
    $sql = "SELECT * FROM in_order where id = '0'";
    $result = mysqli_query($db, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
            $orderby = $row['order_by'];
            echo $orderby;
            $in_order = $row['order_in'];
    }
    ?>
    <form class="display_order" action="pages/add_new_page_func.php" method="post">
    <div class="order">
                    <label for="order-by">Order By</label>
                    <select name="order_by"id="order_by">
                        <option value="id" <?php echo ($orderby == 'id') ? 'selected' : '' ?> >Id</option>
                        <option value="title" <?php echo ($orderby == 'title') ? 'selected' : '' ?>>Title</option>
                    </select>
                    <hr>
                </div>
                <div class="in-order">
                <input type="radio" name="order" id="ascending" value="ascending" <?php echo ($in_order == 'ascending') ? 'checked' : '' ?>>
                    <label for="ascending">Ascending</label>
                    <input type="radio" name="order" id="descending" value="descending" <?php echo ($in_order == 'descending') ? 'checked' : '' ?>>
                    <label for="descending">Descending</label>
                </div>
                <input type="submit" value="submit" name="order_submit">   


    </form>
    <hr>
    
    <hr>
    <center>
            <table>
                <tr>
                    <th scope="col">ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Parent ID</th>
                    <th>Footer</th>
                    <th>Actions</th>
                </tr>
                <?php
                $sql = "SELECT * FROM image";
                $result = mysqli_query($db, $sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $Title = $row['Title'];
                        $description = $row['description'];
                        $image = $row['image'];
                        $parent_id=$row['parent_id'];
                        $footer = $row['is_footer_page'];
                        

                        ?>
                        <tr>
                         <td><?php echo $id ?></td>
                         <td><?php echo $Title ?></td>
                         <td><?php echo $description ?></td>
                         <td><?php echo $image ?></td>
                         <td><?php echo $parent_id ?></td>
                         <td><?php echo $footer ?></td>
                         <td>
                             <button onclick="return confirm('Are you sure you want to Delete?');"><a href="pages/delete_page.php?id=<?php echo $id ?>">Delete</a></button>
                             <a href="<?php echo 'http://' . SITE_URL . '/admin/index.php?page=update_page&id=' . $id ?>">Update</a>
                             <a href="<?php echo 'http://' . SITE_URL . '/admin/index.php?page=image_manager&page_id='. $id ?>">Image Manager</a>
                             
                         </td>
                        </tr>

                        <?php
                    }
                }
                ?>
            </table>