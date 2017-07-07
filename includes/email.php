<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json;charset=utf-8");

require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge
//include_once('db.php'); 
if($_POST['username'] AND $_POST['email'] AND $_POST['message']){
 $name = $_POST['username']; // form field
 $email = $_POST['email']; // form field
 $message = $_POST['message']; // form field

 $from = $email; //enter your email address
 $to = "info@gogiepetroleum.com"; //enter the email address of the contact your sending to
 $subject = (isset($_POST['subject'])) ? $_POST['subject'] : "Contact Form"; // subject of your email

$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject);

$text = ''; // text versions of email.
$html = "<html><body><h2>You have a mail from www.gogiepetroleum.com</h2>Name: $name <br> Email: $email <br>Message: $message <br></body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
$mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "localhost"; // all scripts must use localhost
 $username = "mails@gogiepetroleum.com"; //  your email address (same as webmail username)
 $password = "#gogie2017"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo deliver_response(501,$mail->getMessage(),null);
}
else {
echo deliver_response(200,"Thanks for contacting us, we will get back to you shortly!",null);
// header("Location: http://www.example.com/");
}
}else{
   echo deliver_response(501,"Some required fields are missing!",null); 
}

 ?>
 