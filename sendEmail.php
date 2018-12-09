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
$getLoanList = mysqli_query($conn,"SELECT users.usrName,users.usrMatricID, admins.admName, admins.admEmail, users.usrEmail,tools.*, loans.* FROM loans INNER JOIN users ON loans.lnMatricID=users.usrMatricID INNER JOIN admins ON loans.lnStaffID=admins.admID INNER JOIN tools ON tools.tlID=loans.lnTool WHERE lnStatus = 'Unreturned' ");

while($fetchLoanList = mysqli_fetch_assoc($getLoanList)){
	//set email for user
	$email = $fetchLoanList["usrEmail"];
	$name = $fetchLoanList["usrName"];
	$message = "Dear ".$fetchLoanList["usrName"]."<br>Please return ".$fetchLoanList["lnQuantity"]." ".$fetchLoanList["tlName"]."(".$fetchLoanList["tlVariation"].")";

	//set email for admins
	$admEmail = $fetchLoanList["admEmail"];
	$admName = $fetchLoanList["admName"];
	$admMessage = "Dear ".$fetchLoanList["admName"]."<br>User ".$name." still didn't return ".$fetchLoanList["lnQuantity"]." ".$fetchLoanList["tlName"]."(".$fetchLoanList["tlVariation"].")";


	$mail = new PHPMailer(true);
	$admMail = new PHPMailer(true);							// Passing `true` enables exceptions
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

	    //sent email for the admins

	    //Server settings
	    $admMail->SMTPDebug = 2;									// Enable verbose debug output
	    $admMail->isSMTP();										// Set mailer to use SMTP
	    $admMail->Host = 'smtp.gmail.com';							// Specify main and backup SMTP servers
	    $admMail->SMTPAuth = true;									// Enable SMTP authentication
	    $admMail->Username = 'els.skyrem@gmail.com';				// SMTP username
	    $admMail->Password = '#els.skyrem#1';						// SMTP password
	    $admMail->SMTPSecure = 'ssl';								// Enable TLS encryption, `ssl` also accepted
	    $admMail->Port = 465;										// TCP port to connect to

	    //Recipients
	    $admMail->setFrom('els.skyrem@gmail.com', 'ELS FST Admin');
	    $admMail->addAddress($admEmail, $admName);     // Add a recipient
	    //$mail->addReplyTo('els.skyrem@gmail.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $admMail->isHTML(true);                                  // Set email format to HTML
	    $admMail->Subject = 'Notis Peringatan : Peralatan tidak dipulangkan';
	    $admMail->Body    = $admMessage;
	    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $admMail->send();

		//echo 'Message has been sent';

	    header("Location: index.php?email=true");
	} catch (Exception $e) {
		header("Location: index.php?email=false");
	    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
}
?>