<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$categoryid = $_POST['categoryid'];
$categoryname = $_POST['categoryname'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($categoryname)) {
   echo '<div class="alert alert-danger">Category Name is required.</div>';
}
else
{
	$update =$connection->querY("UPDATE tblcategories SET fldCategoryName = '$categoryname' WHERE fldCategoryId = '$categoryid'");
	echo '<div class="alert alert-success">Successfully Update Category.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>