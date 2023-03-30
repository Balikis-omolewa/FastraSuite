<?php

// Creating connection
$servername = "localhost:3306";
$username = "fastrasu_popupform";
$password = "Alwaysthere@4321";
$dbname = "fastrasu_popupform";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$product = mysqli_real_escape_string($conn, $_POST['product']);

// Insert  into database

$sql = "INSERT INTO popupform (name, email, product) VALUES ('$name', '$email', '$product' )";  

use PHPMailer\PHPMailer\PHPMailer; // Phpmail package already on server
use PHPMailer\PHPMailer\Exception; // Phpmail package already on server

require 'PHPMailer/src/PHPMailer.php'; // Phpmail package already on server
require 'PHPMailer/src/SMTP.php'; // Phpmail package already on server

$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Host = "localhost"; // sets the SMTP server or use the server hostname
$mail->Port = 25; // set the SMTP port for the GMAIL server
$mail->Username = "demorequest@fastrasuite.com"; // SMTP account username
$mail->Password = "Alwaysthere@4321"; // SMTP account password

$mail->SetFrom('demorequest@fastrasuite.com');
$mail->AddReplyTo("demorequest@fastrasuite.com");
$mail->Subject = "Demo Request from FastraSuite Website";
$mail->MsgHTML("<html><body><em>Below is the details of the new record! </em><br><br><br><strong>Name:</strong> $name,<br><br><strong>Email:</strong> $email,<br><br><strong>Product:</strong> $product<br><br><hr><strong>Best regards:</strong> <em>FastraSuite team</em><hr></body></html>");

$mail->AddAddress("info@fastrasuite.com");
//$mail->AddAttachment(""); // attachment

//If the form is submitted successfully
if (!$mail->Send()){
    
} elseif (mysqli_query($conn, $sql)){
    
}
?>


}
mysqli_close($conn);




// Close connection

?>




