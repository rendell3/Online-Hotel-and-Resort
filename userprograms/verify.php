<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$username = $_POST['username'];
$ver_code = $_POST['ver_code'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($username)) {
   echo '<div class="alert alert-danger">Username is required.</div>';
}
else if (empty($ver_code)) {
    echo '<div class="alert alert-danger">Verification Code is required.</div>';
}
else
{
		$select = $connection->query("SELECT *,COUNT(*) AS 'COUNT' FROM tblusers WHERE fldUserUsername = '$username' AND fldUserStatus ='Pending' ");
		$rowsFetch = mysqli_fetch_array($select);
		if ($rowsFetch['fldUserPin'] != $ver_code)
		{
				echo '<div class="alert alert-danger">Incorrect Verification Code.</div>';
		}
		else
		{
			$update =$connection->querY("UPDATE tblusers SET fldUserStatus = 'Active' WHERE fldUserUsername = '$username' AND fldUserStatus ='Pending'");
			echo '<div class="alert alert-success">Successfully Verify Account.</div>';	
			echo "<meta http-equiv='refresh' content='2'>";
		}
}
?>