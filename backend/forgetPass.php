<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require_once('connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST['email'];


  $tokenExist = "SELECT * FROM forgetpass WHERE email='$email'";
  $tokenResult = mysqli_query($conn,$tokenExist); 
  if(mysqli_num_rows($tokenResult) > 0){
        $_SESSION['tokenExist'] = "Reset Password Link has been sent on your email";
        header("Location: ../login.php");
  }


  $sql = "SELECT * FROM details WHERE email='$email'";
  $result = mysqli_query($conn,$sql); 
  
  if(mysqli_num_rows($result) > 0){
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
    $base_url .= "://" . $_SERVER['HTTP_HOST'];
    $length = 16; 
    $bytes = random_bytes($length / 2); 
    $token = bin2hex($bytes);
    $sql = "INSERT INTO `forgetpass`(`email`, `token`) 
            VALUES('$email', '$token')";
     $result = mysqli_query($conn, $sql);      
    if ($result === TRUE) {

        $mail = new PHPMailer(true); 
        try {
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io'; 
            $mail->SMTPAuth = true;
            $mail->Username = '2060382a4cc456';
            $mail->Password = '0a4a988183d62c';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient settings
            $mail->setFrom('info@mailtrap.io', 'Mailtrap');
            $mail->addAddress($email); 

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "PHPMailer SMTP test";
             $mail->Body = '<html>
                            <head>
                            <style>
                                .btn {
                                background-color: #007BFF;
                                color: white;
                                padding: 12px 20px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                border-radius: 5px;
                                font-size: 16px;
                                }
                            </style>
                            </head>
                            <body>
                            <p>Hello,</p>
                            <p>We received a request to reset your password. Click the button below to reset it:</p>

                            <p>
                                <a href="' . $base_url . '/network_updated/network_updated/resetPassword.php?token=' . urlencode($token) . '" class="btn">Reset Password</a>
                            </p>

                            <p>If you didn\'t request a password reset, please ignore this email.</p>

                            <p>Thanks,<br>The Team</p>
                            </body>
                            </html>';

            $mail->AltBody = 'This is the plain text version of the email content';

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $_SESSION['chekyourmail'] = "Reset Password Link has been sent on your email";
                header("Location: ../login.php");
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        } else {
            echo "Error: " . $conn->error;
        } 
    }
    else{
        echo "User is not exist";
            $_SESSION['usernotexist'] = "Your is not exist Please signup in again.";
            header("Location: ../signup.php");
    }
  } 
  else{
      echo "No user found on this email <br>";
  }


?>

