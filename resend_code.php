<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
session_start();
include('dbcon.php');

function resend_email_verify($name, $email, $verify_token){
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
    $mail->Subject = "Resend - Email verification from Chatheriyan";

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


if(isset($_POST['resend_email_verify_btn'])){
    if(!empty(trim($_POST['email']))){
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $checkemail_query = "SELECT * FROM users WHERE email ='$email' LIMIT 1 ";
        $checkemail_query_run = mysqli_query($con, $checkemail_query);
        if(mysqli_num_rows($checkemail_query_run) > 0){
            $row = mysqli_fetch_array($checkemail_query_run);
            if($row['verify_status']=='0'){
                $name = $row['name'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];

                resend_email_verify($name,$email,$verify_token);
                $_SESSION['status'] = "Check your mail for the verification link...";
                header('Location: resend_email_verification.php');
                exit(0);
            }
            else{
                $_SESSION['status'] = "Email already verified. Please login..";
                header('Location: resend_email_verification.php');
                exit(0);
            }
        }
        else{
            $_SESSION['status'] = "Email is not Registered";
            header('Location: register.php');
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = "Please enter the email address";
        header('Location: resend_email_verification.php');
        exit(0);
    }
}