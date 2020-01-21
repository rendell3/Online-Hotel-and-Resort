<?php
session_start();
include '../connection.php';
$txtRole = $_POST['txtRole'];
$txtUsername = $_POST['txtUsername'];
$txtPassword = md5($_POST['txtPassword']);
$txtRepeatPassword = md5($_POST['txtRepeatPassword']);


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
	$insert =$connection->query("INSERT INTO tblusers (fldUserUsername,fldUserPassword,fldUserStatus,fldUserDeleted,tblRoles_fldRoleId) VALUES ('$txtUsername','$txtPassword','Active',0,'$txtRole')");
	echo '<div class="alert alert-success">Successfully Add Users.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>