<?php
 if(isset($_GET['message'])){
    $em = $_GET['message'];
 }else{
    $em ='';
 }
 $limit = 3;
  if(isset($_GET['page_no'])){
     $page_no = $_GET['page_no'];
  }else{
      $page_no = 1;
    }
 $offset = ($page_no-1) * $limit;
 $sql = "SELECT * FROM news_page WHERE is_active='yes' ORDER BY add_date DESC LIMIT {$offset},{$limit}";
 $result = mysqli_query($db,$sql);
 if($result){ ?>
     <section class="All-News">
         <h1 class="section-title">All NEWS</h1>

         <div class="news-item-wrapper">
     <?php
     while($row=mysqli_fetch_assoc($result)){
         $news_id=$row['id'];
         $news_title = $row['news_title'];
         $image = $row['image'];
         $image1 = explode(",", $image);
         $news_content = strip_tags($row['news_content']);
         $rest1 = substr($news_content, 0,10);
         
         ?>
         <div class="news-card">
             <div class="news-left">
                 <h2><?php echo $news_title ?></h2>
                 <img class="news-image-single"src="./admin/news_image/<?php echo $image1[0] ?>">
             </div>
             <div class="news-right">
                 <p><?php echo $rest1 ?>...</p>
                 <a href="?page=single_news&id=<?php echo $news_id ?>">read more.....</a>
             </div>
         </div>
     <?php
     }
     ?>
     </div>
     <?php
     $sql1 = "SELECT * FROM news_page WHERE is_active='yes' ORDER BY add_date";
     $result1 = mysqli_query($db,$sql1);
     if(mysqli_num_rows($result1) > 0){
         $total_news = mysqli_num_rows($result1);
         $total_page = ceil($total_news /  $limit);
         echo '<ul class="pagination">';
         if($page_no > 1){
             echo  '<li class="news-item"><a href="?page=all_news&page_no='.($page_no-1).'">Prev</a></li>';
            }
         
         for($i = 1; $i <= $total_page; $i++){
             if($i==$page_no){
                 $active="active";
             }else{
                $active = ""; 
             }
             
             echo '<li class="news-item '.$active.'"><a href="?page=all_news&page_no='.$i.'">'.$i.'</a></li>';

            }

        }
        if($total_page>$page_no){
            echo  '<li class="news-item"><a href="?page=all_news&page_no='.($page_no+1).'">Next</a></li>';
        }
        
        echo '</ul>';

     ?>
    </section>
    <?php
    } 
    ?>
<section class="subscribe-section">
      <h1>SUSCRIBE US</h1>
      <button class="show-subscribe-form">   SUSCRIBE US   </button>
      <?php
       if(isset($_GET['message'])&&!empty($_GET['message'])){?>
           <p class="error"><?php echo ($_GET['message']) ?></p>
           <?php

       }
       ?>
   <div class="subscribe-form-wrapper" style="display:none;">
   <form  class="form-news"action="pages/suscribe_func.php" method="post"> 
       
   <div  class="close-form"><i class="fa-solid fa-xmark fa-1x"></i></div>
                <h2>Become a Suscriber</h2>
               <p class="para">suscribe to our blog and latest update straight to your inbox</p>
      
             <div class="field">
             
                  <input type="text" name="email" id="email" placeholder="Enter your email"required>
             </div>
             <div class="field-btn">
                  <input type="submit" value="suscribe" name="suscribe_news">
                </div>
                <p>we donot share your your information</p>
                
          </form>
          </div>
          </section>
           