<?php
session_start();
include '../connection.php';
$txtUserId = $_POST['txtUserId'];
$txtRole = $_POST['txtRole'];
$txtUsername = $_POST['txtUsername'];
$txtPassword = $_POST['txtPassword'];
$txtRepeatPassword = $_POST['txtRepeatPassword'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($txtUsername)) {
   echo '<div class="alert alert-danger">User Name is required.</div>';
}
else if (empty($txtPassword)) {
   echo '<div class="alert alert-danger">Password is required.</div>';
}
else if (empty($txtPassword)) {
   echo '<div class="alert alert-danger">Repeat Password is required.</div>';
}
else if ($txtPassword != $txtRepeatPassword) {
	echo '<div class="alert alert-danger">Mismatch Password.</div>';
}
else
{
	if (strlen($txtPassword) == 32)
	{
		$password = $txtPassword;
	}
	else
	{
		$password = md5($txtPassword);	
	}
	$update =$connection->querY("UPDATE tblusers SET fldUserPassword = '$password',
													 tblRoles_fldRoleId = '$txtRole'
								 WHERE fldUserId = '$txtUserId'");
	echo '<div class="alert alert-success">Successfully Update Users.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>