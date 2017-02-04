<?php

require_once ("config.php");

$error = 0;

if (!isset($_POST["name"]))
	$error = 1;

if (!isset($_POST["subject"]))
	$error = 1;

if (!isset($_POST["message"]))
	$error = 1;

if ($error == 0)
{
	$user = $_POST["name"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$to = Primary_Email_ID;
 	$subject = "Contact Form : " . $user;
 	$body = "<p> Subject: " . $subject . "</p>" . "<div>" . $message . "</div>";

    $headers = 'From: CollegeSpace contact@collegeSpace.in' . "\r\n" ;
    $headers .= 'Cc: apoorv2711@gmail.com' . "\r\n";
    $headers .='Reply-To: '. $to . "\r\n" ;
    $headers .='X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	if (!mail($to, $subject, $body,$headers))
  		$error = 1;
}

if ($error > 0) { print("Invalid Request"); die(); }
else print("Message Sent Successfully");

?>
