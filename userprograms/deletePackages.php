<?php
session_start();
include '../connection.php';
$id = $_POST['id'];
date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$update =$connection->query("UPDATE tblpackages SET fldPackageDeleted = '1' WHERE fldPackageId = '$id'");
?>