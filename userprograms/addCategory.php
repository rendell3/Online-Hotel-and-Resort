<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$categoryname = $_POST['categoryname'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($categoryname)) {
   echo '<div class="alert alert-danger">Category Name is required.</div>';
}
else
{
	$insert =$connection->query("INSERT INTO tblcategories (fldCategoryName,fldCategoryDeleted) VALUES ('$categoryname',0)");
	$select = $connection->query("SELECT MAX(fldCategoryId)+1 as 'categoryid' FROM  tblcategories");
	$rows = mysqli_fetch_array($select);
	$categoryid = $rows['categoryid'];
	$insert1 =$connection->query("INSERT INTO roomcounters (ID,NEXTID,CATEGORY) VALUES (null,101,'$categoryid')");
	echo '<div class="alert alert-success">Successfully Add Category.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>