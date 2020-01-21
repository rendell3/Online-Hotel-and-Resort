<?php
session_start();
include '../connection.php';
$refno = $_POST['refno'];
$roomno = $_POST['roomno'];
$refid = $_POST['refid'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$insert =$connection->query("UPDATE currentbookrooms SET PRODUCTID ='$roomno' WHERE ID = '$refid' and REFERENCENO = '$refno' ");
echo '<div class="alert alert-success">Successfully Re-Assign Rooms.</div>';	
echo "<meta http-equiv='refresh' content='1;url=AssignedRooms'>";

?>
