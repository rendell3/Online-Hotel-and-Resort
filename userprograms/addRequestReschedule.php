<?php
session_start();
include '../connection.php';
$req_id = $_POST['req_id'];
$req_checkIn = $_POST['req_checkIn'];
$req_checkOut = $_POST['req_checkOut'];
$req_refno = $_POST['req_refno'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$checkInDateFormat  = DateTime::createFromFormat("Y-m-d H:i:s",$_POST['req_checkIn'])->format("Y-m-d");
$checkOutDateFormat = DateTime::createFromFormat("Y-m-d H:i:s",$_POST['req_checkOut'])->format("Y-m-d");
$datetoday = date("Y-m-d");

$today =date("Y-m-d H:i:s");

if (empty($req_checkIn)) {
   echo '<div class="alert alert-danger">Check In Date is required.</div>';
}
else if (empty($req_checkOut)) {
   echo '<div class="alert alert-danger">Check Out Date is required.</div>';
}
else if ($checkInDateFormat< $datetoday){
   echo '<div class="alert alert-danger">Check In is not lower than from date today.</div>';
}
else if ($checkOutDateFormat <= $checkInDateFormat){
   echo '<div class="alert alert-danger">Check Out is not lower than from date of Check In.</div>';
}
else
{
	$insert =$connection->querY("INSERT INTO requestreschedule VALUES (null,'$req_id','$req_checkIn','$req_checkOut','Request Resched','$req_refno')");
	echo '<div class="alert alert-success">Successfully submit your Request.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>