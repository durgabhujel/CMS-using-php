<?php include('server.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration System php and MYSQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-form-wrapper">
    <form action="login.php" method="post">
        <div class="header">
            <h2>Login</h2>
        </div>
      <?php include('errors.php'); ?>

        <div class="input-group">
            <label for="username">username</label><br>
            <input type="text" name="username" id="username" placeholder="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>">
        </div>

        <div class="input-group">
            <label for="password">password</label><br>
            <input type="password" name="password_1" id="password" placeholder="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">

        </div>
        <div class="input-group">
           <label for="remember-me">Remember me</label>
            <input type="checkbox" name="remember-me" id="remember-me">
            
        </div>
        <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
        </div>
    
        <p style=color:green>
            Not yet a member?<a href="register.php" style=color:red>Sign Up</a>
        </p>
    </form>
    </div>

    
</body>
</html>