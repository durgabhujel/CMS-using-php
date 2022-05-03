<?php
include('constants.php');
include('errors.php');
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
                header('location: index.php');
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
                    header('location: http://'.SITE_URL.'/admin/index.php?page=admin_manager');
                }

            }elseif ($newpassword!=$confirmpassword){
                array_push($errors,"newpassword and confirmpassword do not match");
            }
            else{
                array_push($errors,"old password is do not match");
            }
        } else {
            header('location: http://'.SITE_URL.'/admin/index.php?page=admin_manager');
        }

    }

if(isset($_POST['request_quote'])){
    $firstname=isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $lastname=isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $phone=isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
    $email=isset($_POST['email']) ? trim($_POST['email']) : '';
    $address_1=isset($_POST['address1']) ? trim($_POST['address1']) : '';
    $address_2=isset($_POST['address2']) ? trim($_POST['address2']) : '';
    $date=isset($_POST['date']) ? trim($_POST['date']) : '';
    $contact=isset($_POST['contact_me']) ? $_POST['contact_me'] : '';
    $contact = is_array($contact) ? implode(", ", $contact) : $contact;
    $gender=isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $service_interested =isset($_POST['service_interested']) ? $_POST['service_interested'] : '';
    $service_interested = is_array($service_interested) ? implode(", ", $service_interested) : $service_interested;
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $errors = array();
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

//Array
// (
//     [first_name] => Durga122333
//     [last_name] => Bhujel
//     [phone_number] =>  +9779824994232
//     [email] => deepen916@gmail.com
//     [address1] => ilam
//     [address2] => kathmandu
//     [postal_code] => 45678
//     [date] => 03/25/2022
//     [contact_me] => Array
//         (
//             [0] => email
//             [1] => phone
//         )

//     [gender] => male
//     [service_intersted] => Array
//         (
//             [0] => wesite_desinging
//             [1] => web_hosting
//             [2] => mobile_application
//         )

//     [message] => message for quote
//     [captcha] => 7kEu6V
//     [request_quote] => submit
// )
  

    $captcha_input = trim($_POST['captcha']);
    if(!preg_match('/[A-Za-z]+/', $firstname)){
        array_push($errors, "First name should only contain letters");
    }
    if(!preg_match('/[A-Za-z]+/', $lastname)){
        array_push($errors, "Last name should only contain letters");
    }
    if(!preg_match('/^(\+977)?[\s.-]?\d{10}$/', $phone)){ /* ^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$ */
        
        array_push($errors, "Phone Number does not match Nepali standard.");
        
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "email should be valided");
    } 
    // if($_SESSION["code"]!=$captcha_input){
    //     array_push($errors, "captcha code does not match");
    // }
    if(count($errors) == 0){
        $to = "deepen916@gmail.com";
        $subject = "Quote request from My Website";
        $txt = "Hi Admin,

        You\'ve received a quote request from the website on: " . date('Y/M/d') .". Details below:
         First Name: " . $firstname . "
         Last Name: " . $lastname . "
         Phone no: "  . $phone ."
         Address 1: " . $address_1 ."
         Address2: "  . $address_2 ."
         Contact through: " . $contact ."
         Gender: " .$gender ."
         Service Intrested: " . $service_interested ."
        
        Thank you,
        My Site
        ";
        $headers = "From: noreply@mysite.com" . "\r\n" .
        "Reply-To: " . $email  . "\r\n" .
        "From Name: My Website";

        if(mail($to,$subject,$txt,$headers)) {
            header("Location: index.php?page_id=28");
        }

    } else {
        header("Location: index.php?page_id=28&message=".$errors['0']);
    }
    
}