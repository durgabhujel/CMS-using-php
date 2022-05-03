<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content managment system</title>

    <link rel="stylesheet" href="assets/css/frontend-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://kit.fontawesome.com/f0e17e19a7.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" integrity="sha512-cViKBZswH231Ui53apFnPzem4pvG8mlCDrSyZskDE9OK2gyUd/L08e1AC0wjJodXYZ1wmXEuNimN1d3MWG7jaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/front-script.js"></script>
</head>
<body>
    <header class="top-header">
        <div class="site-logo"></div>
        <nav class="primary-navigation">
            <?php
            $query = "SELECT * FROM in_order";
            $order_result = mysqli_query($db,$query);
            if($order_result){
                $order_row = mysqli_fetch_row($order_result);
                if($order_row[1] == 'title'){
                    $orderby = 'Title';
                } else {
                    $orderby = 'id';
                }
                if($order_row[2] == 'ascending'){
                    $orderin = 'ASC';
                }else {
                    $orderin = 'DESC';

                }
            }
            $sql = "SELECT * FROM image where parent_id='-1' ORDER BY $orderby $orderin";
            $result = mysqli_query($db, $sql);
            if($result){ ?>
                <ul>
                    <?php
                while($row=mysqli_fetch_assoc($result)){
                    $page_id = $row['id']; //page_id=parent_id
                    ?>
                    <li class="menu-item"><a href="?page=single_page&page_id=<?php echo $row['id'] ?>"><?php echo $row['Title'] ?></a>
                    <?php
                    $child_page_sql = "SELECT * FROM image where parent_id='$page_id'";
                    $result1= mysqli_query($db,$child_page_sql);
                    $result2 = mysqli_query($db,$child_page_sql);
                    if($result1){
                        $row2=mysqli_fetch_row($result2);
                        echo $row2 ? '<span class="dropdown-indicator"><i class="fa-solid fa-caret-down"></i></span>' : '' ?>
                        <ul class="sub-menu">
                            <?php
                            while($row1=mysqli_fetch_assoc($result1)){?>
                                <li class="submenu-item"><a href="?page=single_page&page_id=<?php echo $row1['id'] ?>"><?php echo $row1['Title'] ?></a></li>
                            <?php
                            }
                            ?>


                        
                        </ul></li> <?php

                    }
                } ?>
                <li>
                    <li class="right">
                        <a href="?page=single_page&lang=en<?php echo $row['en'] ?>">en</a>
                          
                    </li>
                    <li class="right">
                          <a href="?page=single_page&lang=np<?php echo $row['np'] ?>">nep</a>
                        </li>

                    

                </li>
            </ul>
        </nav>
    </header>
    <?php
    }