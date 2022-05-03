<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="frontend-styles.css">
</head>
<body>
    <header class="top-header">
        <div class="site-logo"></div>
        <nav class="primary-navigation">
            <?php
            include 'db.php';
            $sql = "SELECT * FROM image";
            $result = mysqli_query($db, $sql);
            if($result){ ?>
                <ul>
                    <?php
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <li><a href="display.php?page_id=<?php echo $row['id'] ?>"><?php echo $row['Title'] ?></a></li>
                    <?php
                } ?>
                </ul>
        </nav>
    </header>
    <?php
    }