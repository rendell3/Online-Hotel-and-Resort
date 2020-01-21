<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$id = $_POST['id'];

$select = $connection->query("SELECT * FROM tblbookpackages where id = '$id'");
$rows = mysqli_fetch_array($select);
$email = $rows['CREATEDBY'];
date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$update =$connection->query("UPDATE tblbookpackages SET STATUS = 'For Payment' WHERE ID = '$id'");

$message = '<h2>Proceed to Payment Transaction</h2></br>
<p>Your booking request is now approved. You may now proceed to payment transaction.</p>
<p style="color:red;font-weight:bold;">Note: After 24 hours that you did not pay we will automatic disapprove your booking. Thank you!</p>';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
					);
$mail->send();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'greenfieldsReserve@gmail.com';
$mail->Password = 'greenpassw0rdfields';
$mail->setFrom('greenfieldsReserve@gmail.com', 'Greenfields Paradise Resort');
$mail->addReplyTo('greenfieldsReserve@gmail.com', 'Greenfields Paradise Resort');
$mail->addAddress($email);
$mail->Subject = 'Greenfields Paradise Resort | Payments';
$mail->msgHTML($message);
					                    if (!$mail->send()) {
					                       $error = "Mailer Error: " . $mail->ErrorInfo;
					                        ?><script>alert('<?php echo $error ?>');</script><?php
					                    } 
					                    else {
					         //               echo "<div class='alert alert-success'>
										    //   <strong>Successfully Message Sent!</strong> 
										    // </div>";	
										  	echo "<meta http-equiv='refresh' content='1'>";
						 }
$mail->smtpClose();

?>