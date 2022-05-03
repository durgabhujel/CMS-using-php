<?php
session_start();

$username = "";
$email = "";
$errors = array();

//connect to database 
$db = mysqli_connect('localhost', 'root', '', 'registration');

//Register user
if (isset($_POST['register'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //ensure that form field are connect properly
    if (empty($username)) {
        array_push($errors, "user name is required");
    }
    if(empty($email)) {
        array_push($errors, "Email is required");

    }
    if (empty($password_1)) {
        array_push($errors, "password is required");
    }
    if($password_1 != $password_2) {
        array_push($errors, "The two password do not match"); 
    }
    //if there are no errors , save user to database
    if (count($errors) ==0) {
        $password = md5($password_1); //encrypt password before storing before storing in database
        $sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "you are logged in";
        header('location: index.php');
        
    }
}
    //log user in login page
    if (isset($_POST['login'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password_1']);

        if (empty($username)) {
            array_push($errors, "user name is required");
        }
        if (empty($password)) {
            array_push($errors ,"password is required");
        }
        if (count($errors) == 0) {
            $md5Password = md5($password);
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$md5Password'";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "you are logged in";
                if(!empty($_POST['remember-me'])){
                    $remember_me = $_POST['remember-me'];
                    setcookie('username', $username, time()+3600);
                    setcookie('password', $_POST['password_1'], time()+3600);
                }
                header('location:index.php');
            }else{
                array_push($errors, "wrong username/password combination");  
            }
        }
    }

    //logout
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');

    }

?>