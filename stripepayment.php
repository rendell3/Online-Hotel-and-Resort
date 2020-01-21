<?php
include 'connection.php';
// require_once "config.php";
require_once "stripe-php-master/init.php";
date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");
$date = date("Y-m-d");
\Stripe\Stripe::setApiKey("sk_test_6WWTi298XQ4alc6Xs3VTZBUQ");
	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$id = $_GET['id'];
	$type = $_GET['type'];
	if ($type=="fp")
	{
		$type = "Fully Payment";
	
	}
	else
	{
		
		$type="Half Payment";
	}

	$amount = $_GET['a'];
	$select = $connection->query("SELECT *,IF('$type'='fp',TOTAL,TOTAL/2) as 'TOTALAMOUNT' FROM tblbookpackages WHERE ID = '$id'") or die(mysqli_error($connection));
	$rows = mysqli_fetch_array($select);

	$insert = $connection->query("INSERT INTO payments VALUES (null,'".$rows['REFERENCENO']."','$date','$amount','')");
	$update = $connection->query("UPDATE tblbookpackages SET STATUS ='$type',DATEPAYMENT='$date' WHERE ID = '$id'") or die(mysqli_error($connection));

// 	\Stripe\Stripe::setVerifySslCerts(false);

// 	// if (!isset($_POST['stripeToken']) || !isset($id)) {
// 	// 	header("Location: buyitems.php");
// 	// 	exit();
// 	// }

$token = $_POST['stripeToken'];


$charge = \Stripe\Charge::create([
    'amount' => ''.($rows['TOTAL']*100).'',
    'currency' => 'php',
    'description' => ''.$rows['REFERENCENO'].'',
    'source' => $token,
    'statement_descriptor' => 'Payment for '.$rows['REFERENCENO'].'',
]);

echo "<script>alert('Payment Successfully')
	  window.location.href = '/?page=view'</script>";
?>