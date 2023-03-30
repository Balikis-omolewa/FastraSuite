
<?php
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
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert  into database

$sql = "INSERT INTO contactform (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message' )";

// Send to mail path
        $to = 'info@fastrasuite.com';
        
       $subject = 'New message from contact-page';
       $headers = "From: ".$name." <".$email."> \r\n <".$subject."> \r\n" .$message."> \r\n";
       $send_email = mail($to,$subject,$message,$headers);

       //echo ($send_email) ? 'success' : 'error';

// If the form is submitted successfully
if (mysqli_query($conn, $sql))
  {
 
}
?>


}
mysqli_close($conn);




// Close connection

?>

<html>
    <head></head>
    <body>
        <div class="col-lg-6">
            <form action="contact-page.php" method="POST" class="php-email-form">
              <div class="row gy-4">
                
                <div class="col-md-6">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control"  id="email" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" id="message" name="message" rows="6" placeholder="Message" required></textarea>
                </div>
               
                <div class="col-md-12 text-center">
                  
                    
                  <button type="submit"  name="submit" class="btn btn-primary">Send Message</button>
                </div>

              </div>
            </form>

          </div>



    </body>
</html>
 