<?php
session_start();
include '../connection.php';
$amount = $_POST['amount'];
$refno = $_POST['refno'];
$remarks = $_POST['remarks'];

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

if (empty($amount) || $amount=0.00) {
   echo '<div class="alert alert-danger">Amount is required.</div>';
}
else
{
	$insert =$connection->query("INSERT INTO payments (REFERENCENO,DATEPAYMENT,AMOUNT,REMARKS) VALUES ('$refno','$date','$amount','$remarks')");
	$update =$connection->query("UPDATE tblbookpackages set STATUS ='Checked Out' WHERE REFERENCENO = '$refno'");
	$delete =$connection->query("DELETE FROM currentbookrooms WHERE REFERENCENO = '$refno'");
	echo '<div class="alert alert-success">Successfully Post Payment.</div>';	
	echo "<meta http-equiv='refresh' content='1;url=panel'>";
}
?>