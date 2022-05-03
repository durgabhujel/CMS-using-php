<div class="table-content">
 <table>
    <tr>
     <th><scope="col">ID</th>
     <th>Email</th>
     <th>Suscribe Date</th>
     <th>Actions</th>
    </tr>
    <?php
    $sql = "SELECT * FROM news_suscriber";
    $result=mysqli_query($db,$sql);
    if($result){
       while($row=mysqli_fetch_assoc($result)){
          $suscriber_id= $row['id'];
          $email = $row['email'];
          $suscribe_date = $row['suscribe_date'];
          ?>
          <tr>
              <td><?php echo $suscriber_id ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $suscribe_date ?></td>
              <td>
                 <a class="suscriber_news" href="pages/delete_suscriber.php?id=<?php echo $suscriber_id ?>"><i class="fa-solid fa-trash-can fa-1x icon"></i></a>
               </td>
          </tr> 
          <?php
         }
      
      }?>
   
   

    
 </table>
</div>