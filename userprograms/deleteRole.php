<?php
session_start();
include '../connection.php';
$Roleid = $_POST['Roleid'];
$Rolename = $_POST['Rolename'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($Rolename)) {
   echo '<div class="alert alert-danger">Role Name is required.</div>';
}
else
{
	$update =$connection->querY("UPDATE tblroles SET fldRoleDeleted = '1' WHERE fldRoleId = '$Roleid'");
	echo '<div class="alert alert-danger">Successfully Delete Role.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>