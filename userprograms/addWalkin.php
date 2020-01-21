<?php
session_start();
include '../connection.php';
$username = $_SESSION['username'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$refno = $_POST['refno'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$checkintime = $_POST['checkin']." 00:00:00";
$checkouttime = $_POST['checkout']." 00:00:00";
$downpayment = $_POST['downpayment'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");
$date = date("Y-m-d");

if (empty($firstname)) {
   echo '<div class="alert alert-danger">Firstname is required.</div>';
}
else if (empty($lastname)) {
   echo '<div class="alert alert-danger">Lastname is required.</div>';
}
else if (empty($contact)) {
   echo '<div class="alert alert-danger">Contact number is required.</div>';
}
else
{
	// echo $checkintime;
	$insert =$connection->query("INSERT INTO tblcustomers VALUES (null,'$firstname','$lastname','$email','$contact',0,'$today','$today','2')");

	$selectPackages= $connection->query("SELECT * FROM tblmodbookpackages WHERE CREATEDBY = '$username'");
	while ($rowsPackages = mysqli_fetch_array($selectPackages))
	{

		$insertpacka = $connection->query("INSERT INTO tblbookpackageitems VALUES (null,'$refno','".$rowsPackages['fldPackageId']."','".$rowsPackages['fldPackagePrice']."','".$rowsPackages['fldPackageName']."','".$rowsPackages['fldPackageQuantity']."','".$rowsPackages['fldPackageTotal']."','$username','$checkin')");
	}
	$insertPackges =$connection->query("INSERT INTO tblbookpackages VALUES (null,'".$firstname." ".$lastname."','$today','$checkintime','$checkouttime','Check In','$refno','$checkin','$downpayment','$checkin','Walk In')");
	$insertpyments =$connection->query("INSERT INTO payments VALUES (null,'$refno','$date','$downpayment','$remarks')");
	$del = $connection->query("DELETE FROM tblmodbookpackages WHERE createdby='$username'");
	echo '<div class="alert alert-success">Successfully Check In.</div>';	
	echo "<meta http-equiv='refresh' content='1'>";
}
?>