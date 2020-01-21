<?php
session_start();
include '../connection.php';
$username =$_SESSION['username'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$succeeding = $_POST['succeeding'];
$products = $_POST['products'];
$code = $_POST['code'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");
$productimplode='';
if (empty($name)) {
   echo '<div class="alert alert-danger">Package Name is required.</div>';
}
else
{
	foreach ($products as $product)
	{
		$valuesArr[] = "$product";
		$filter = mysqli_real_escape_string($connection,$product);
		$select = $connection->query("SELECT * FROM tblproducts where fldProductName = '$filter'");
		$rows = mysqli_fetch_array($select);

		$productid = $rows['fldProductId'];
		$insert = $connection->query("INSERT INTO tblmodpackagesproducts VALUES (null,'$code','$productid','$today','$username')") or die(mysqli_error($connection));
	}

	$productimplode .= implode(',', $valuesArr);
	$insert = $connection->query("INSERT INTO tblpackages VALUES (null,'$name','$description','$price','$succeeding',0,'$today','$code','$productimplode')") or die(mysqli_error($connection));
		echo '<div class="alert alert-success">Successfully Add Packages.</div>';	
		echo "<meta http-equiv='refresh' content='1'>";


}
// else
// {
// 	$insert =$connection->querY("INSERT INTO tblcategories (fldCategoryName,fldCategoryDeleted) VALUES ('$categoryname',0)");
// 	echo '<div class="alert alert-success">Successfully Add Category.</div>';	
// 	echo "<meta http-equiv='refresh' content='1'>";
// }
?>