<?php
session_start();

include("dbcon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token){
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2;
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->isSMTP();  
    $mail->SMTPAuth   = true;  

    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'phpmailer0069@gmail.com';                     
    $mail->Password   = 'zsmbrqsydasybiuv';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    $mail->setFrom('phpmailer0069@gmail.com', $name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Email verification from Chatheriyan";

    $email_template = "
    <h2>You have registered with Chatheriyan</h2>
    <h5>Verify your mail ID by using the link given below.</h5>
    <br/><br/>
    <a href='http://localhost:4444/IIIC/verify_email.php?token=$verify_token'>Click me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';
}

if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    
    //Email exists or not
    $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run)>0){
        $_SESSION['status'] = "Email ID already Exists";
        header("Location: register.php");

    }
    else{
        //Insert user data
        $query = "INSERT INTO users(name,phone,email,password,verify_token) VALUES('$name','$phone','$email','$password','$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            sendemail_verify("$name","$email","$verify_token");
            $_SESSION['status'] = "Registration sucessfull....Please verify your email address";
            header("Location: register.php");
        }

        else{
            $_SESSION['status'] = "Registration failed...";
            header("Location: register.php");
        }
    }

}