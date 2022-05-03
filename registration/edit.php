<?php
session_start();
if (!isset($_SESSION['username'])){
    $_SESSION['msg'] = "login to access this page";
    header('location: login.php');
}
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location:login.php");
}
include("admin-header.php");
?>
<?php
$username="";

$oldpassword="";
$newpassword="";
$confirmpassword="";
$errors = array();

$db = mysqli_connect('localhost','root','','registration');
if(isset($_POST['update_user']))
{
    $username = $_SESSION['username'];
    
    $oldpassword = mysqli_real_escape_string($db, $_POST['oldpassword']);
    $confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);
    $newpassword = mysqli_real_escape_string($db, $_POST['newpassword']);
    if(empty($oldpassword)){
        array_push($errors, "oldpassword is required");

    }
    if(empty($newpassword)){
        array_push($errors, "new password is required");
    }
    if(empty($confirmpassword)){
        array_push($errors, "confirm password is required");

    }
    if(count($errors)==0){
        $sql="SELECT * FROM users WHERE username='$username'";
        $result= mysqli_query($db, $sql);
        $user=mysqli_fetch_assoc($result);
        $password= $user['password'];
        if(md5($oldpassword)==$password && $newpassword==$confirmpassword){
            $newpassword = md5($newpassword);
            $sql="UPDATE users SET password='$newpassword' WHERE username='$username'";
            if(mysqli_query($db,$sql)){
                $_SESSION['success']="user data updated";
                header('location:edit.php');
            }

        }elseif ($newpassword!=$confirmpassword){
            array_push($errors,"newpassword and confirmpassword do not match");
        }
        else{
            array_push($errors,"old password is do not match");
        }
    }

}
?>


    
    <form action="edit.php" method="POST">
    <?php include('errors.php'); ?>
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
    <?php if (isset($_SESSION['username'])): ?>
    <div id="login message">
        <h3><?php echo $_SESSION['username']?> is now logged in</h3>
        <p><a href="login.php?logout=1">Log out</a></p>

    </div>
    <?php endif ?>
    <?php if(isset($_SESSION['success'])):?>
        <div id="success">
        <h3>redth's<?php echo $_SESSION['success'] ?></h3>
        </div>
    <?php endif?>



    
</body>
</html>
