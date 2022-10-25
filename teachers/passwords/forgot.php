<?php
// path
function pathTo($destination) {
  echo "<script>window.location.href = '/attendance/teachers/$destination.php'</script>";
}

// database
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/vendor/autoload.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['reset'])) {
  $email = trim($_POST['email']);

  $queryForgotPassword = "SELECT * FROM users WHERE email = '$email' ";
  $sqlForgotPassword = mysqli_query($con, $queryForgotPassword);
  
  if (mysqli_num_rows($sqlForgotPassword) == 1) {
    $result = mysqli_fetch_array($sqlForgotPassword);
    $password = $result['password'];

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'scso.boado.sjc@phinmaed.com';                     //SMTP username
    $mail->Password   = 'Boado@050800';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('scso.boado.sjc@phinmaed.com', 'Attendance Team');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New password';
    $mail->Body    = 'Click this to setup for your new password http://localhost/attendance/teachers/passwords/new-password.php';

    $mail->send();
    echo "<script>window.alert('Message has been sent to your email')</script>";
    pathTo('login');
  } else {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}