<?php
session_start();
include '../connection.php';
$can_id = $_GET['can_id'];
$can_refno = $_GET['can_refno'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$update =$connection->query("UPDATE tblbookpackages set STATUS = 'Cancelled' WHERE ID = '$can_id'");
// echo '<div class="alert alert-success">Successfully Cancel Your Booking.</div>';	
// echo "<meta http-equiv='refresh' content='1'>";
echo "<script>alert('Successfully Cancel Your Booking.')
	  window.location.href = '../?page=view'</script>";

?>
