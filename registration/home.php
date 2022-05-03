<?php include"admin-header.php" ?>
    <form action="appdata.php" method="post" enctype="multipart/form-data">
        <center>
            <div class="main">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title"required><br>
                <label for="description">Description</label><br>
                <textarea class="ck-editor-field" name="description" id="description" required></textarea>
                <label for="image">Image</label><br>
                <input type="file" name="image" id="image"required><br>
                <input type="submit" name="upload" value="upload">
            </div>
        </center>
        <hr>
        <hr>
        


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
                    <th>Actions</th>
                </tr>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM image";
                $result = mysqli_query($db, $sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $Title = $row['Title'];
                        $description = $row['description'];
                        $image = $row['image'];
                        ?>
                        <tr>
                         <td><?php echo $id ?></td>
                         <td><?php echo $Title ?></td>
                         <td><?php echo $description ?></td>
                         <td><?php echo $image ?></td>
                         <td>
                             <button onclick="return confirm('Are you sure you want to Delete?');"><a href="delete.php?id=<?php echo $id ?>">Delete</a></button>
                             <a href="update.php?id=<?php echo $id ?>">update</a>
                             <a href="imagemanager.php?page_id=<?php echo $id ?>">imagemanager</a>
                             
                         </td>
                        
                        </tr>

                        <?php
                    }
                }
                ?>
            </table>
       
<?php
include "footer.php";
?>