<?php

include "fronthead.php";
    include 'db.php';
    if(isset($_GET['page_id'])){
        $page_id = $_GET['page_id'];
        $sql = "SELECT * FROM  image where id = '$page_id'";
        $result = mysqli_query($db, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $Title = $row['Title'];
                $description= $row['description'];
                $image = $row['image'];
                ?>
                <header><h1>Display ITEM</h1></header>
                <div>
                    <h1><?php echo $Title ?></h1>
                    <img  src="uploadImage/<?php echo $image ?>" height="300px" width="300px" >
                    <p><?php echo $description ?></p>
                </div>
            <?php

        }
    }
} else {
    $sql = "SELECT * FROM  image where Title = 'Home'";
    $result = mysqli_query($db, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        if($row){
            $Title = $row['Title'];
            $description= $row['description'];
            $image = $row['image'];
            ?>
            <header><h1>Display ITEM</h1></header>
            <section>
                <h1><?php echo $Title ?></h1>
                <img  src="uploadImage/<?php echo $image ?>" height="300px" width="300px" >
                <p><?php echo $description ?></p>
            </section>
            <?php
        }
    }

}
    