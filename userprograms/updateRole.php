<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$roleid = $_POST['roleid'];
$rolename = $_POST['rolename'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($rolename)) {
   echo '<div class="alert alert-danger">Role Name is required.</div>';
}
else
{
	$update =$connection->querY("UPDATE tblroles SET fldroleName = '$rolename' WHERE fldroleId = '$roleid'");
	echo '<div class="alert alert-success">Successfully Update role.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>