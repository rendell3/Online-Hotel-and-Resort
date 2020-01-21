<?php
// error_reporting(0);
session_start();
include '../connection.php';

$txtCode = mysqli_real_escape_string($connection,$_POST['txtCode']);
$txtId = $_POST['txtId'];
$txtName = mysqli_real_escape_string($connection,$_POST['txtName']);
$txtDescription = mysqli_real_escape_string($connection,$_POST['txtDescription']);
$txtPrice = $_POST['txtPrice'];
$txtSucceeding = $_POST['txtSucceeding'];
$txtProducts = mysqli_real_escape_string($connection,$_POST['txtProducts']);

date_default_timezone_set('Asia/Manila');
$dtime = date("Y-m-d H:i:s");
$today = date("Y-m-d");

$update = $connection->query("UPDATE tblpackages SET fldPackageName = '$txtName',
                                                     fldPackageDescription = '$txtDescription',
                                                     fldPackagePrice = '$txtPrice',
                                                     fldPackageSucceeding='$txtSucceeding',
                                                     CODE = '$txtCode',
                                                     PRODUCTS = '$txtProducts'
                             WHERE fldPackageId = '$txtId'");
echo '<div class="alert alert-success">Successfully Update Packages.</div>';	
echo "<meta http-equiv='refresh' content='1;url=packages'>";

?>