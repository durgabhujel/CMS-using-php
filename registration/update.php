<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <center><header><h1>update information</h1></header></center>
    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM image where id = $id";
    $result = mysqli_query($db, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);{
            $Title = $row['Title'];
            $description = $row['description'];
            $image = $row['image'];
        }
    }
    ?>
    <form action="update1.php" method="post" enctype="multipart/form-data">
        <center>
            <div class="main">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title" value="<?php echo $Title ?>" required><br>
                <label for="description">Description</label><br>
                <input type="text" name="description" id="description"value="<?php echo $description ?>"required><br>
                <label for="image">Image</label><br>
                <input type="file" name="image" id="image" value="<?php echo $image ?>"required><br>
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                <input type="submit" name="update" value="update">
            </div>
        </center>
        <hr>
        <hr>
        


    </form>
    
        

</body>
</html>