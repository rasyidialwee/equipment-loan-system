<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");

//required file for PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



//getting the list of loan which have unreturned status
$getLoanList = mysqli_query($conn,"SELECT users.usrName,users.usrMatricID, users.usrEmail,tools.*, loans.* FROM loans INNER JOIN users ON loans.lnMatricID=users.usrMatricID INNER JOIN tools ON tools.tlID=loans.lnTool WHERE lnStatus = 'Unreturned' ");

while($fetchLoanList = mysqli_fetch_assoc($getLoanList)){
	$email = $fetchLoanList["usrEmail"];
	$name = $fetchLoanList["usrName"];
	//echo $email;
	$message = "Dear ".$fetchLoanList["usrName"]."<br>Please return ".$fetchLoanList["lnQuantity"]." ".$fetchLoanList["tlName"]."(".$fetchLoanList["tlVariation"].")";
	//echo $message;


	$mail = new PHPMailer(true);								// Passing `true` enables exceptions
	try {
	    //Server settings
	    $mail->SMTPDebug = 2;									// Enable verbose debug output
	    $mail->isSMTP();										// Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';							// Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;									// Enable SMTP authentication
	    $mail->Username = 'els.skyrem@gmail.com';				// SMTP username
	    $mail->Password = '#els.skyrem#1';						// SMTP password
	    $mail->SMTPSecure = 'ssl';								// Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 465;										// TCP port to connect to

	    //Recipients
	    $mail->setFrom('els.skyrem@gmail.com', 'ELS FST Admin');
	    $mail->addAddress($email, $name);     // Add a recipient
	    //$mail->addReplyTo('els.skyrem@gmail.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Notis Peringatan : Pemulangan peralatan dengan segera.';
	    $mail->Body    = $message;
	    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'Message has been sent';
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}
?>