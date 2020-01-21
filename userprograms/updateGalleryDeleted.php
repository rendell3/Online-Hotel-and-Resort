<?php
session_start();
include '../connection.php';
$id = $_POST['id'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$update =$connection->querY("UPDATE tblImages set fldImageDeleted = 1 WHERE fldImageId = '$id'");
?>