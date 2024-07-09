<?php
use PHPMailer\PHPMailer\PHPMailer;
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer (true);
//Server settings
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth =true;
$mail->Username = 'tutormubatekno@gmail.com';
$mail->Password = 'hekuvjimgpsabydd';
$mail->SMTPSecure = PHPMailer:: ENCRYPTION_SMTPS;
$mail->Port= 465; 

if (isset($_POST['kirim'])){
    $mail->setFrom('tutormubatekno@gmail.com', 'Tutorial Muba Teknologi'); 
    $mail->addAddress($_POST['email_penerima']); 
    $mail->addReplyTo('email_penerima' , 'Tutorial Muba Teknologi'); 

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['pesan'];

    if($mail->send()){
        echo"<script>
        alert('Email Berhasil Dikirm ')
        document.location.href = 'email.php';
        </script>";
    } else{
        echo"<script>
        alert('Email Gagal Dikirm ')
        document.location.href = 'email.php';
        </script>";
    }
 exit();
}
?>
