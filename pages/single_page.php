<?php
if(isset($_GET['page_id'])){
        $page_id = $_GET['page_id'];
    } else {
        $page_id = '22';
    }
        $sql = "SELECT * FROM  image where id = '$page_id'";
        $result = mysqli_query($db, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $Title = $row['Title'];
                $description= $row['description'];
                $image = $row['image'];
                ?>
                <div class="main-content">
                    <h1><?php echo $Title ?></h1>
                    <img  src="uploadImage/<?php echo $image ?>">
                    <p><?php echo $description ?></p>
                </div>
            <?php

        }
    }
    if($page_id=='28'){
         ?>
        <form action="server.php" method="post">
          <div class="input-group">
             <label for="First-name">First Name *</label>
             <input type="text" name="first_name" id="first-name" placeholder="First Name" required>
          </div>
          <div class="input-group">
             <label for="last-name">Last Name *</label>
             <input type="text" name="last_name" id="last-name" placeholder="Last name" required>
          </div>
          <div class="input-group">
              <label for="phone-number">phone Number</label>
              <input type="text" name="phone_number" id="phone-number" placeholder="phone number" required>
          </div>
           <div class="input-group">
              <label for="email">Email *</label><br>
              <input type="text" name="email" id="email" placeholder="email" required>
            </div>
           
           <div class="input-group">
              <label for="address1">Address1</label>
              <input type="text" name="address1" id="address1" placeholder="optional">

           </div>
           <div class="input-group">
              <label for="address2">Address2</label>
              <input type="text" name="address2" id="address2" placeholder="optional">
           </div>
           <div class="input-group">
                <label for="postal-code">Postal Code</label>
                <input type="text" name="postal_code" id="postal-code">
           </div>
           <div class="input-group">
              <label for="date">Date</label><br>
              <input type="text" name="date" id="date" class="datepicker" placeholder="YY/MM/DD">
           </div>
           <div class="input-group">
                <label for="contact-me">Contact me via </label><br>
                <select name="contact_me[]" id="contact-me"multiple>
                   <option value="email">Email</option>
                   <option value="phone">phone</option>
                </select>
           </div>
           <div class="input-group">
               <p>Gender</p>
               <input type="radio" name="gender" value="male" id="male">
               <label for="male">Male</label>
               <input type="radio" name="gender" value="female" id="female">
               <label for="female">Female</label>
            </div>
            <div class="input-group">
                <label for="service-intrested">Service you intrested</label>
                <select name="service_interested[]" id="service-intersted"multiple>
                    <option value="social_media-markting">Social media markting</option>
                    <option value="wesite_desinging">wesite designing</option>
                    <option value="web_hosting">web hosting</option>
                    <option value="mobile_application">Mobile application Development</option>
                </select>
            </div>
            <div class="input-group">
                <label for="message">Meassage</label>
                <textarea name="message" rows="5" cols="30" id="message" placeholder="message"></textarea>
            </div>
            <div class="input-group">
             <img src="captcha-image.php" alt=""><input id="textBox" type="text" name="captcha" class="captcha">
             </div>
            <div>
                <input type="submit" value="submit" name="request_quote">
            </div>

        </form>
<?php
    }
    if($page_id == '22') {
        $sql = "SELECT * FROM news_page WHERE is_active='yes' ORDER BY add_date LIMIT 3";
        $result = mysqli_query($db,$sql);
        if($result){ ?>
            <section class="latest-news">
                <h1 class="section-title">Latest News</h1>
                <div class="news-item-wrapper">
             <?php
             while($row=mysqli_fetch_assoc($result)){
                 $news_id=$row['id'];
                 $news_title = $row['news_title'];
                 $image = $row['image'];
                 $image1 = explode(",", $image);
                 $news_content = strip_tags($row['news_content']);
                 $rest1 = substr($news_content, 0,30);
                
                 ?>
                 <div class="news-card">
                    <div class="news-left">
                        <h2><?php echo $news_title ?></h2>
                        <img class="news-image-single"src="./admin/news_image/<?php echo $image1[0] ?>" > 
            
                    </div>
                    <div class="news-right">
                        <p><?php echo $rest1 ?>...</p>
                        <a class="read-more"href="?page=single_news&id=<?php echo $news_id ?>">read more.....</a>
                    </div>

                 </div>
                 <?php
                

            
                }?>
            
        
            
                
            
                </div>
            
             <div class="allnews-link">
                  <a href="?page=all_news">All News</a>
                </div>
            </section>
            <?php
        }
    }
    if($page_id == '44') {
        $sql1 = "SELECT * FROM download_page WHERE is_active = 'yes'";
        $result1 = mysqli_query($db,$sql1);
        if($result1){?>
        <div class="wrapper">
            <?php
            while($row=mysqli_fetch_assoc($result1)){
                $id = $row['id'];
                $file_name = $row['file_name'];
                $file = $row['file'];
                $size = $row['size'];
                ?>
                <div class="download-wrapper">
                    <div class="dowload-content">
                        <h2 class="download-title"><?php echo $file_name ?></h2>
                        <?php
                        $extension = trim(pathinfo($file, PATHINFO_EXTENSION));
                        // die();
                        switch ($extension) { 
                            
                        // 'zip', 'pdf', 'xls','docx','jpg'
                            case 'zip':
                                ?>
                                <i class="fa-solid fa-file-zipper download-icon"></i>
                                <?php
                            break;
                            case 'pdf':?>
                                <i class="fa-solid fa-file-pdf download-icon"></i>
                                <?php
                                break;
                            case 'xls':?>
                                <i class="fa-solid fa-table download-icon"></i>
                                <?php
                                break;
                            case 'docx':?>
                                <i class="fa-regular fa-file download-icon "></i>
                                <?php
                                break;  
                            case 'jpg':?>
                                <i class="fa-solid fa-file-image download-icon"></i>
                                <?php
                                break;     
                            default:?>
                              <i class="fa-solid fa-file-arrow-down download-icon"></i>
                            <?php
                        }
                        ?>
                    </div>  
                    <div class="download-btn"><a href="?page=download_document&download_id=<?php echo $id ?>">Downloads</a></div>      
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        }

    }