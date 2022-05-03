<?php
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
         $rest1 = substr($news_content, 0,2);
         
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
             echo  '<li class="news-item"><a href="?page=suscribe&page_no='.($page_no-1).'"</a>prev</li>';
            }
         
         for($i = 1; $i <= $total_page; $i++){
             if($i==$page_no){
                 $active="active";
             }else{
                $active = ""; 
             }
             
             echo '<li class="news-item '.$active.'"><a href="?page=suscribe&page_no='.$i.'">'.$i.'</a></li>';

            }

        }
        if($total_page>$page_no){
            echo  '<li class="news-item"><a href="?page=suscribe&page_no='.($page_no+1).'"</a>Next</li>';
        }
        
        echo '</ul>';

     ?>
     </section>
     <?php
    } 
     ?>
    <div class="suscribe">
      <a href="?page=all_news">   SUSCRIBE US   </a>
   </div>