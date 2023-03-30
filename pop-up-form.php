<?php
include('Mail.php');
$servername = "localhost";
$username = "fastrapop";
$password = "Alwaysthere@4321";
$dbname   = "fastrasu_popup";

if(isset($_POST['submit'])) {
    
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// echo "Connected successfully";

$username = 'popup.form@fastrasuite.com'; // your email address
$password = 'Alwaysthere@4321'; // your email address password

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];




$from = "popup.form@fastrasuite.com";
$to = "popup.form@fastrasuite.com";
$subject = "New User SignIn to FastraSuite Pop Up Form";
$body= "";

$body .= "Name: ".$name. "\r\n";
$body .= "Email: ".$email. "\r\n";
$body .= "Phone: ".$phone. "\r\n";


 mail($to,$subject,$body);
 // header('Location: apply.html');

$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject); // the email headers
$smtp = Mail::factory('smtp', array ('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
$mail = $smtp->send($to, $headers, $body); // sending the email
  
// $sql = "INSERT INTO pop_up_form (name, email, phone ) VALUES ('$name', '$email', '$phone')";


if (PEAR::isError($mail) || ($conn->query($sql) === TRUE)) {
    echo "Your submission is recieved and we will contact you soon.";
} else {
    echo "Success " . $sql . "<br>" . $conn->error;
    // header("Location: http://apply.html/"); // you can redirect page on successful submission.
}
$conn->close();
    
}

?>


<html>
    <head></head>
    
    <body>
        <!-- Popup Form begins-->
 <div class="login-popup">
       <div class="box">
               <div class="img-area">
                    <div class="img"></div>
                <h1><img src="assets/img/erp-pop-logo.jpg" alt="fastra-logo" width="200px" height="40px"></h1>
                </div>

                <div class="form">
                    <div class="close">&times;</div>
                    <p style=" margin-left: 10px; font-size: 22px; text-align: center;  color: #000; margin-top:-30px;  font-weight: bolder;">Streamline your business operations from anywhere at anytime. </p>
                    <h1 style="color: #ddd; font-size: 22px;">Sign In</h1>
                    
                    <form action="pop-up-form.php" method="POST" class="php-email-form" id="sendform">
                        <div class="form-group">
                            <input type="text" id="name"  name='name' class="form-control" placeholder="Company's Name">
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name='email' class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" name='phone' class="form-control" placeholder="Phone Number">
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn"> Send </button>
                    </form>
                </div>
            </div></div>
   
<!-- Popup Form ends-->

    </body>
</html>
