<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the form fields and sanitize the data
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // Set the recipient email address
  $to = 'ruben.vdmerwe15@gmail.com';

  // Set the email subject
  $subject = 'New message from your website';

  // Set the email message
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";

  // Set the email headers
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    echo "OK";
  } else {
    echo "Unable to send email. Please try again later.";
  }

} else {
  echo "Access denied.";
}
?>