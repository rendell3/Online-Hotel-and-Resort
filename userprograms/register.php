<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = md5($_POST['password']);
$confirm = md5($_POST['confirm']);

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($firstname)) {
   echo '<div class="alert alert-danger">First name is required.</div>';
}
else if (empty($lastname)) {
    echo '<div class="alert alert-danger">Last name is required.</div>';
}

else if (empty($email)) {
    echo   '<div class="alert alert-danger">Email Address is required.</div>';
}

else if (empty($mobile)) {
    echo    '<div class="alert alert-danger">Contact Number  is required.</div>';
}

else if (empty($password)) {
    echo '<div class="alert alert-danger">Password is required.</div>';
}

else if ($password != $confirm) {
    echo '<div class="alert alert-danger">Passwords does not match.</div>';
}
else
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
			  echo "<small style='font-size:13px;color:red;'>Invalid email address.</small>";
	}
	else
	{
		$select = $connection->query("SELECT *,COUNT(*) AS 'COUNT' FROM tblusers WHERE fldUserUsername = '$email' ");
		$rowsFetch = mysqli_fetch_array($select);
			if ($rowsFetch['COUNT'] == 1)
			{
					 echo '<div class="alert alert-danger">Email address is already used!</div>';
			}
			else
			{
					// $random = base64_encode(openssl_random_pseudo_bytes(6));
	 				$code = substr(str_shuffle("0123456789"), 0, 4);

					$message = '<h2>Verify Account</h2></br>
	 				 <p>Your verification code : '.$code.'</p>';
					$insert = $connection->query("INSERT INTO tblusers (fldUserId,fldUserUsername,fldUserPassword,fldUserPin,fldUserStatus,tblRoles_fldRoleId)VALUES (null,'$email','$password','$code','Pending',2)");
					$insertcustomer = $connection->query("INSERT INTO tblcustomers VALUES (null,'$firstname','$lastname','$email','$mobile',0,'$today','$today',2)");
					// $insert->execute([null,$email,$password,$code,'Pending']);

					 
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
					 $mail->Password = 'GreenFields@Password';
					 $mail->setFrom('greenfieldsReserve@gmail.com', 'Greenfields Paradise Resort | Verification');
					 $mail->addReplyTo('greenfieldsReserve@gmail.com', 'Greenfields Paradise Resort');
					 $mail->addAddress($email);
					                    $mail->Subject = 'Greenfields Paradise Resort | Verification';
					                    $mail->msgHTML($message);
					                    if (!$mail->send()) {
					                       $error = "Mailer Error: " . $mail->ErrorInfo;
					                        ?><script>alert('<?php echo $error ?>');</script><?php
					                    } 
					                    else {
					                       echo "<div class='alert alert-success'>
										      <strong>Successfully Message Sent!</strong> </br>You can check your email now for verification!!
										    </div>";	
										    echo "<meta http-equiv='refresh' content='5'>";
						 }
					 $mail->smtpClose();
					// echo "<small style='font-size:13px;color:green;'>Successfully Register!.</small>";
					// echo "<meta http-equiv='refresh' content='1'>";
			}
		}
}
?>