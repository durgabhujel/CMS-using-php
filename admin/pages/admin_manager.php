<?php
if (!isset($_SESSION['username'])){
    $_SESSION['msg'] = "login to access this page";
    header('location: login.php');
}
?>
    <form action="../server.php" method="POST">
    <?php include('../errors.php'); ?>
      <div class="input-group">
          <label for="oldpassword">Oldpassword</label>
          <input type="password" name="oldpassword" required>
      </div>
      <div class="input-group">
          <label for="newpassword">newpassword</label>
          <input type="password" name="newpassword" required>
        </div>
        <div class="input-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirmpassword">
        </div>
        <button type="submit" id="btn" name="update_user">UPDATE</button>
    </form>
    <?php if(isset($_SESSION['success'])):?>
        <div id="success">
        <h3><?php echo $_SESSION['username'] . '\'s ' . $_SESSION['success'] ?></h3>
        </div>
    <?php endif?>



    

