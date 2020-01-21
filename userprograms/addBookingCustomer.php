<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Manila');
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$customer = $_SESSION['customer-id'];
$refno = $_POST['refno'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];

$checkInDateFormat  = DateTime::createFromFormat("Y-m-d H:i:s",$_POST['checkIn'])->format("Y-m-d");
$checkOutDateFormat = DateTime::createFromFormat("Y-m-d H:i:s",$_POST['checkOut'])->format("Y-m-d");
$datetoday = date("Y-m-d");

$today =date("Y-m-d H:i:s");

if (empty($checkIn)) {
   echo '<div class="alert alert-danger">Check In Date is required.</div>';
}
else if (empty($checkOut)) {
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
	$select = $connection->query("SELECT BookDate,sum(fldPackageTotal) as 'TOTAL' FROM tblmodbookpackages where createdby = '$customer'");
	$rows = mysqli_fetch_array($select);
	$bookdate = $rows['BookDate'];
	$total = $rows['TOTAL'];
	$insert =$connection->query("INSERT INTO tblbookpackages VALUES (null,'$customer','$today','$checkIn','$checkOut','For Payment','$refno','$bookdate','$total','','Online Booking')");
	$selectItems = $connection->query("SELECT * FROM tblmodbookpackages where createdby = '$customer'");

	while ($rowItems = mysqli_fetch_array($selectItems))
	{
		$packageid = $rowItems['fldPackageId'];
		$price = $rowItems['fldPackagePrice'];
		$name = mysqli_real_escape_string($connection,$rowItems['fldPackageName']);
		$qty = $rowItems['fldPackageQuantity'];
		$total = $rowItems['fldPackageTotal'];
		$bkdate = $rowItems['BookDate'];

	$insert =$connection->query("INSERT INTO tblbookpackageitems VALUES (null,'$refno','$packageid','$price','$name','$qty','$total','$customer','$bkdate')");
	
	// $selectbookRoom = $connection->query("SELECT * FROM currentbookrooms WHERE PRODUCTID= '$packageid'");
	// $count = mysqli_num_rows($selectbookRoom);
	// 	if ($count == 0)
	// 	{
	// 		$insert =$connection->query("INSERT INTO currentbookrooms VALUES (null,'$packageid','$refno')");		
	// 	}
	}
	$del = $connection->query("DELETE FROM tblmodbookpackages WHERE createdby='$customer'");
	echo '<div class="alert alert-success">successfully Booking! Proceed to payment transaction. Thank you for booking with us!</div>';
	echo "<meta http-equiv='refresh' content='1'>";
}
?>
