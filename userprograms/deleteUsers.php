<?php
session_start();
include '../connection.php';
$txtUserId = $_POST['txtUserId'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$update =$connection->query("UPDATE tblusers SET fldUserDeleted = '1' WHERE fldUserId = '$txtUserId'");
echo '<div class="alert alert-danger">Successfully Delete User.</div>';	
echo "<meta http-equiv='refresh' content='1'>";
?>