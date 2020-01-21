<?php
session_start();
include '../connection.php';
$refno = $_POST['refno'];
$roomno = $_POST['roomno'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$insert =$connection->query("INSERT INTO currentbookrooms VALUES (null,'$roomno','$refno')");
echo '<div class="alert alert-success">Successfully Assign Rooms.</div>';	
echo "<meta http-equiv='refresh' content='1'>";

?>
