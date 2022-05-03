

</div>
<footer class="footer-container">
<h6 class="footer-title">&copyCopyright 2022</h6>

    <nav class="footer-menu">
        <h2 class="quick-link">Quick Link</h2>
    <?php
         $sql = "SELECT * FROM image where parent_id='-1'AND is_footer_page='on'";
        $result = mysqli_query($db,$sql);
        if($result){?>
            <ul><?php 
            while($row=mysqli_fetch_assoc($result)){
                $page_id = $row['id'];?>
                <li class="footer-menu-item"><a class="submenu-item-item1" href="?page=single_page&page_id=<?php echo $page_id ?>"><?php echo $row['Title'] ?></a>
                 <?php
                 $child_page_sql = "SELECT * FROM image where parent_id='$page_id'";
                 $result1 = mysqli_query($db,$child_page_sql);
                 $result2 = mysqli_query($db,$child_page_sql);
                 if($result1){
                     $row2 = mysqli_fetch_row($result2);
                     echo $row2 ? '<span class="dropdown-indicator"><i class="fa-solid fa-caret-down"></i></span>' : '' ?>
                      <ul class="footer-sub-menu">
                            <?php
                            while($row1=mysqli_fetch_assoc($result1)){?>
                                <li class="submenu-item"><a href="?page=single_page&page_id=<?php echo $row1['id'] ?>"><?php echo $row1['Title'] ?></a></li>
                            <?php
                            }
                            ?>


                        
                        </ul>
                        <?php


                    } ?>
                </li>
                <?php


            }
            ?>
            </ul>
    </nav>
            <?php
        }
        ?>
        <div class="footer-social-link"><h2>Contact with us</h2>
            <a href="#"><img src="./Image/linkin.png" class="footer-img"></a>
            <a href="#"><img src="./Image/facebook.png" class="footer-img"></a>
            <a href="#"><img src="./Image/twiter.png" class="footer-img"></a>
        </div>
</footer>
</body>
</html>