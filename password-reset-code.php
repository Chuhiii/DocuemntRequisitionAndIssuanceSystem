<?php
session_start();
include('connection.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_fullname, $get_email, $token)
{

    $mail = new PHPMailer(true);
    //Server settings                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients    
    $mail->setFrom('from@example.com', '$get_name');
    $mail->addAddress('$get_email');               //Name is optional
    //Attachments
    
    $mail ->isHTML(true);
    
    $mail->Subject = "Reset Password Notification";

    $email_template = "
        <h2>Hello</h2>
        <h3>You are reciving this eamil because we received a password reset request for your account.</h3>
        <br/><br/>
        <a href='http://localhost:3000/password-change.php?token=$token&email=$get_email';> Click Me </a>
    ";
    

    $mail ->Body = $email_template;
    $mail->send();
    
}

if(isset($_POST['reset_password_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM registration WHERE email ='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) >> 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_fullname = $row['first_name'].''.$row['middle_initial'].''.$row['last_name'];
        $get_email = $row['email'];

        $update_token = "UPDATE registration set verify_token ='$token' WHERE email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            
            send_password_reset($get_fullname, $get_email, $token);
            $_SESSION['message'] = "Check your email for password-reset";
            header("Location: password-reset.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Something Went Wrong";
            header("Location: password-reset.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "No email found";
        header("Location: password-reset.php");
        exit(0);
    }
}

?>