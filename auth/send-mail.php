<?php
// Database connection details
include("../api/connection.php");

// Check connection
if (!$conn) {
    echo "Connection not established: " . mysqli_connect_error();
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        // Create PHPMailer instance
        $mail = new PHPMailer(true);

        // Enable verbose debug output
        $mail->SMTPDebug = 2;

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'relearnveri@gmail.com'; // Update with your SMTP username
            $mail->Password = 'ufwroydywpascvaf'; // Update with your SMTP password
            $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' based on your SMTP server
            $mail->Port = 587; // Update with your SMTP port

            // Email content
            $mail->setFrom('relearnveri@gmail.com', 'Gudide Me Web');
            $mail->addAddress($email);
            $mail->isHTML(true);

            // Generate a random 6-digit number
            function generateRandomNumber() {
                return mt_rand(100000, 999999);
            }

            $code = generateRandomNumber();
            $mail->Subject = 'Reset Password Verification Code';
            $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <!-- Google Fonts Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <style>
    body {
      margin: 0;
      font-family: \'Poppins\', sans-serif;
    }
    .heading {
      margin: 25px 0 10px;
      padding-bottom: 15px;
      font-size: 15px;
      color: #3c4852;
      border-bottom: 0.1px solid #d1d1d1;
      width: max-content;
    }
    .code {
      font-size: 18px;
      padding-bottom: 50px;
    }
    .contact {
      font-size: 12px;
      color: #3c4852;
    }
    a {
      color: #3498DB;
      text-decoration: none;
    }
    #logo-con {
      font-size: 12px;
      width: max-content;
      margin-top: 15px;
      color: #000;
    }
  </style>
</head>
<body>
  <center>
    <div class="heading">code</div>
    <div class="code">' . $code . '</div>
  </center>

  <script>
    $("#logo-con").click(function() {
      window.open("https://www.nismwala.com/", "_self");
    });
  </script>
</body>
</html>';

            // Send the email
            if ($mail->send()) {
                $insert = "INSERT INTO `reset`(`id`, `email`, `code`) VALUES (NULL, '$email', '$code')";
                $query = mysqli_query($conn, $insert);
                
                if (!$query) {
                    echo "f"; // Return an error message
                    exit();
                } else {
                    echo "p"; // Return a success message
                    exit();
                }
            }
            exit();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>