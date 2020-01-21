<?php
session_start();
include '../connection.php';
$rolename = $_POST['rolename'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($rolename)) {
   echo '<div class="alert alert-danger">Role Name is required.</div>';
}
else
{
	$insert =$connection->querY("INSERT INTO tblroles (fldRoleName,fldRoleDeleted) VALUES ('$rolename',0)");
	echo '<div class="alert alert-success">Successfully Add Role.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>